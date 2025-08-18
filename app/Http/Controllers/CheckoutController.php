<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function index()
    {
        return Inertia::render('Checkout/Index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string',
            'cart_items' => 'required|array|min:1',
            'cart_items.*.product_id' => 'required|exists:products,id',
            'cart_items.*.quantity' => 'required|integer|min:1',
        ]);

        // Create or find customer
        $customer = Customer::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
            ]
        );

        // Calculate total
        $total = 0;
        foreach ($request->cart_items as $item) {
            $product = \App\Models\Product::find($item['product_id']);
            $total += $product->price * $item['quantity'];
        }

        // Create order
        $order = Order::create([
            'customer_id' => $customer->id,
            'total_amount' => $total,
            'status' => 'pending',
        ]);

        // Create order items
        foreach ($request->cart_items as $item) {
            $product = \App\Models\Product::find($item['product_id']);
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $product->price,
            ]);

            // Update stock
            $product->decrement('stock', $item['quantity']);
        }

        return redirect()->route('checkout.success', $order);
    }

    public function success(Order $order)
    {
        return Inertia::render('Checkout/Success', [
            'order' => $order->load('customer', 'orderItems.product'),
        ]);
    }
}
