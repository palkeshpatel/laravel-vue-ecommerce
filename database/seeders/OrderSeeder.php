<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample customers
        $customers = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '+1234567890',
                'address' => '123 Main St, New York, NY 10001',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '+1234567891',
                'address' => '456 Oak Ave, Los Angeles, CA 90210',
            ],
            [
                'name' => 'Mike Johnson',
                'email' => 'mike@example.com',
                'phone' => '+1234567892',
                'address' => '789 Pine Rd, Chicago, IL 60601',
            ],
            [
                'name' => 'Sarah Wilson',
                'email' => 'sarah@example.com',
                'phone' => '+1234567893',
                'address' => '321 Elm St, Miami, FL 33101',
            ],
            [
                'name' => 'David Brown',
                'email' => 'david@example.com',
                'phone' => '+1234567894',
                'address' => '654 Maple Dr, Seattle, WA 98101',
            ],
        ];

        foreach ($customers as $customerData) {
            Customer::create($customerData);
        }

        // Create sample orders
        $products = Product::all();
        $customers = Customer::all();
        $statuses = ['pending', 'paid', 'shipped', 'completed', 'cancelled'];

        for ($i = 0; $i < 20; $i++) {
            $customer = $customers->random();
            $status = $statuses[array_rand($statuses)];
            
            // Create order
            $order = Order::create([
                'customer_id' => $customer->id,
                'total_amount' => 0, // Will be calculated
                'status' => $status,
                'created_at' => now()->subDays(rand(1, 30)),
            ]);

            // Add order items
            $total = 0;
            $numItems = rand(1, 3);
            
            for ($j = 0; $j < $numItems; $j++) {
                $product = $products->random();
                $quantity = rand(1, 3);
                $price = $product->price;
                
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);
                
                $total += $price * $quantity;
            }
            
            // Update order total
            $order->update(['total_amount' => $total]);
        }
    }
}
