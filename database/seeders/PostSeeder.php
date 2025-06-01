<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Make sure we have at least one user
        if (User::count() === 0) {
            User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
            ]);
        }

        $users = User::all();

        // Create 50 sample posts
        foreach(range(1, 50) as $index) {
            Post::create([
                'title' => fake()->sentence(rand(4, 8)),
                'content' => fake()->paragraphs(rand(3, 7), true),
                'user_id' => $users->random()->id,
                'published_at' => rand(0, 1) ? Carbon::now()->subDays(rand(1, 30)) : null,
                'created_at' => Carbon::now()->subDays(rand(1, 60)),
                'updated_at' => Carbon::now()->subDays(rand(1, 60)),
            ]);
        }
    }
}

// php artisan db:seed --class=PostSeeder