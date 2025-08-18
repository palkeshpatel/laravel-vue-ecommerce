<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Electronics
            [
                'name' => 'Wireless Bluetooth Headphones',
                'category' => 'Electronics',
                'description' => 'High-quality wireless headphones with noise cancellation and long battery life.',
                'price' => 89.99,
                'stock' => 50,
            ],
            [
                'name' => 'Smartphone Case',
                'category' => 'Electronics',
                'description' => 'Durable protective case for smartphones with shock absorption.',
                'price' => 19.99,
                'stock' => 100,
            ],
            [
                'name' => 'USB-C Charging Cable',
                'category' => 'Electronics',
                'description' => 'Fast charging USB-C cable compatible with all modern devices.',
                'price' => 12.99,
                'stock' => 200,
            ],

            // Clothing
            [
                'name' => 'Cotton T-Shirt',
                'category' => 'Clothing',
                'description' => 'Comfortable cotton t-shirt available in multiple colors and sizes.',
                'price' => 24.99,
                'stock' => 75,
            ],
            [
                'name' => 'Denim Jeans',
                'category' => 'Clothing',
                'description' => 'Classic denim jeans with perfect fit and durability.',
                'price' => 59.99,
                'stock' => 40,
            ],
            [
                'name' => 'Hooded Sweatshirt',
                'category' => 'Clothing',
                'description' => 'Warm and comfortable hooded sweatshirt for casual wear.',
                'price' => 39.99,
                'stock' => 60,
            ],

            // Home & Garden
            [
                'name' => 'Garden Tool Set',
                'category' => 'Home & Garden',
                'description' => 'Complete set of essential garden tools for all your gardening needs.',
                'price' => 79.99,
                'stock' => 25,
            ],
            [
                'name' => 'LED Desk Lamp',
                'category' => 'Home & Garden',
                'description' => 'Modern LED desk lamp with adjustable brightness and color temperature.',
                'price' => 34.99,
                'stock' => 80,
            ],
            [
                'name' => 'Kitchen Knife Set',
                'category' => 'Home & Garden',
                'description' => 'Professional kitchen knife set with wooden block storage.',
                'price' => 129.99,
                'stock' => 30,
            ],

            // Books
            [
                'name' => 'Programming Fundamentals',
                'category' => 'Books',
                'description' => 'Comprehensive guide to programming fundamentals for beginners.',
                'price' => 29.99,
                'stock' => 45,
            ],
            [
                'name' => 'Cookbook Collection',
                'category' => 'Books',
                'description' => 'Collection of delicious recipes from around the world.',
                'price' => 19.99,
                'stock' => 90,
            ],

            // Sports & Outdoors
            [
                'name' => 'Yoga Mat',
                'category' => 'Sports & Outdoors',
                'description' => 'Non-slip yoga mat perfect for home workouts and yoga sessions.',
                'price' => 29.99,
                'stock' => 70,
            ],
            [
                'name' => 'Water Bottle',
                'category' => 'Sports & Outdoors',
                'description' => 'Insulated water bottle to keep drinks cold for hours.',
                'price' => 24.99,
                'stock' => 120,
            ],

            // Beauty & Health
            [
                'name' => 'Face Moisturizer',
                'category' => 'Beauty & Health',
                'description' => 'Hydrating face moisturizer for all skin types.',
                'price' => 18.99,
                'stock' => 85,
            ],
            [
                'name' => 'Vitamin C Supplements',
                'category' => 'Beauty & Health',
                'description' => 'High-quality vitamin C supplements for immune support.',
                'price' => 15.99,
                'stock' => 150,
            ],
        ];

        foreach ($products as $productData) {
            $category = Category::where('name', $productData['category'])->first();
            
            if ($category) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => $productData['name'],
                    'slug' => Str::slug($productData['name']),
                    'description' => $productData['description'],
                    'price' => $productData['price'],
                    'stock' => $productData['stock'],
                ]);
            }
        }
    }
}
