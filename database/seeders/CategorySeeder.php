<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'Cat 1',
        ]);

        Category::factory()->create([
            'name' => 'Cat 2',
        ]);

        Category::factory()->create([
            'name' => 'Cat 3',
        ]);

        Category::factory()->create([
            'name' => 'Cat 4',
        ]);
    }
}
