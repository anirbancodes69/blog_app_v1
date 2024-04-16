<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        $blogs = Blog::all();

        foreach ($blogs as $blog) {
            $likeUsers = $users->random(random_int(1, 5));
            foreach ($likeUsers as $user) {
                \App\Models\Like::create([
                    'user_id' => $user->id,
                    'blog_id' => $blog->id
                ]);
            }
        }



    }
}
