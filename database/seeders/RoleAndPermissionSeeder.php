<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Truncate permissions related tables
        Schema::disableForeignKeyConstraints();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        // Create permissions
        $permissions = [
            // Posts permissions
            'admin.posts.index',
            'admin.posts.create',
            'admin.posts.show',
            'admin.posts.edit',
            'admin.posts.destroy',
            
            // Users permissions
            'admin.users.index',
            'admin.users.create',
            'admin.users.show',
            'admin.users.edit',
            'admin.users.destroy',
            
            // Roles permissions
            'admin.roles.index',
            'admin.roles.create',
            'admin.roles.show',
            'admin.roles.edit',
            'admin.roles.destroy',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create or update roles and assign permissions
        // Super Admin gets all permissions
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $superAdmin->syncPermissions(Permission::all());

        // Editor gets posts management and view users
        $editor = Role::firstOrCreate(['name' => 'Editor']);
        $editor->syncPermissions([
            'admin.posts.index',
            'admin.posts.create',
            'admin.posts.show',
            'admin.posts.edit',
            'admin.posts.destroy',
            'admin.users.index',
            'admin.users.show',
        ]);

        // Writer gets limited posts access
        $writer = Role::firstOrCreate(['name' => 'Writer']);
        $writer->syncPermissions([
            'admin.posts.index',
            'admin.posts.create',
            'admin.posts.show',
            'admin.posts.edit',
        ]);

        $this->command->info('Roles and Permissions seeded successfully!');
    }
}
// php artisan db:seed --class=RoleAndPermissionSeeder