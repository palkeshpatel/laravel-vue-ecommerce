<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics' => 'Latest gadgets and electronic devices',
            'Clothing' => 'Fashion and apparel for all ages',
            'Home & Garden' => 'Home improvement and garden supplies',
            'Books' => 'Books, magazines, and educational materials',
            'Sports & Outdoors' => 'Sports equipment and outdoor gear',
            'Beauty & Health' => 'Beauty products and health supplements',
        ];

        foreach ($categories as $name => $description) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
