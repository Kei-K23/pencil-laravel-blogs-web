<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create()->each(function ($user) {
            \App\Models\Blog::factory(10)->create(['author_id' => $user->id])->each(function ($blog) {
                \App\Models\Command::factory(6)->create(['user_id' => $blog->author_id, 'blog_id' => $blog->id]);
            });
        });
    }
}
