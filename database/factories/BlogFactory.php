<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4, true),
            'content' => fake()->paragraphs(10, true),
            'image' => URL::to(asset('front/dist/images/01.jpg')),
            'status' => Arr::random(Blog::$blogStatus)
        ];
    }
}
