<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ProductCategory::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categories = [
            [
                'name' => 'Ring',
                'slug' => 'ring',
                'description' => 'Beautiful rings for every occasion.',
            ],
            [
                'name' => 'Necklace',
                'slug' => 'necklace',
                'description' => 'Elegant necklaces to enhance your style.',
            ],
            [
                'name' => 'Bracelet',
                'slug' => 'bracelet',
                'description' => 'Charming bracelets for your wrist.',
            ],
            [
                'name' => 'Charms',
                'slug' => 'charms',
                'description' => 'Unique charms to personalize your jewelry.',
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
