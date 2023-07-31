<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Entree'],
            ['name' => 'Maki'],
            ['name' => 'Sushi'],
            ['name' => 'Desserts'],
            ['name' => 'Boisson'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
