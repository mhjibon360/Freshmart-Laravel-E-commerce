<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Symfony\Component\Clock\now;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $categories = [
            'Fruits & Vegetables',
            'Dairy Products',
            'Bakery Items',
            'Meat & Poultry',
            'Seafood',
            'Snacks & Chips',
            'Beverages',
            'Organic Foods',
            'Frozen Foods',
            'Grains & Rice',
            'Spices & Herbs',
            'Breakfast & Cereal',
            'Sauces & Condiments',
            'Nuts & Seeds',
            'Health Foods',
            'Sweets & Desserts',
            'Juices & Smoothies',
            'Pasta & Noodles',
            'Canned Foods',
            'Cooking Oils',
            'Baby Foods',
            'Tea & Coffee',
            'Chocolate & Confectionery',
            'Pickles & Chutneys',
            'Fermented Foods',
            'Gluten-Free Products',
            'Vegetarian & Vegan',
            'International Cuisine',
            'Fast Food',
            'Diet & Low-Calorie',
        ];

        $data = [];

        foreach ($categories as $category) {
            $data[] = [
                'category_name' => $category,
                'category_slug' => Str::slug($category),
                'created_at' => now(),
            ];
        }

        DB::table('blog_categories')->insert($data);
    }
}
