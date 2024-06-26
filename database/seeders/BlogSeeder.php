<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        for ($i = 0; $i < 50; $i++) {
            $user = $users->random();
            \App\Models\Blog::factory()->create([
                'user_id' => $user->id
            ]);
        }
    }
}
