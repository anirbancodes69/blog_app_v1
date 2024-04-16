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
        \App\Models\User::factory(500)->create();

        $this->call(BlogSeeder::class);

        $this->call(LikeSeeder::class);

        $this->call(CategorySeeder::class);

        $this->call(CategoryBlogSeeder::class);

    }
}
