<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks before truncating
        Schema::disableForeignKeyConstraints();
        
        // Truncate the users table
        DB::table('users')->truncate();
        
        // Re-enable foreign key checks
        Schema::enableForeignKeyConstraints();

        // Create admin user
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole('Super Admin');

        // Create regular users with Editor role
        $editor = User::create([
            'name' => 'Regular User',
            'email' => 'user@user.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);
        $editor->assignRole('Editor');

        // Create additional demo users using factory and assign Writer role
        User::factory(5)->create()->each(function ($user) {
            $user->assignRole('Writer');
        });
    }
} 

// php artisan db:seed --class=UserSeeder