<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $blogs = Blog::all();

        foreach ($blogs as $blog) {
            $category_to_select = $categories->random();
            \App\Models\CategoryBlog::create([
                'blog_id' => $blog->id,
                'category_id' => $category_to_select->id
            ]);

        }



    }
}
