<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    // Display the checkout form
    public function showCheckoutForm()
    {
        // If the cart is empty, redirect to the products page
        if (!session('cart') || count(session('cart')) == 0) {
            return redirect()->route('products')->with('error', 'Your cart is empty!');
        }

        return view('student.checkout');
    }

    // Handle the checkout submission
    public function submitOrder(Request $request)
    {
        // Validate the shipping information
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
        ]);

        // Retrieve cart data from the session
        $cart = session('cart');

        // Calculate total price
        $totalPrice = 0;
        foreach ($cart as $product) {
            $totalPrice += $product['price'] * $product['quantity'];
        }

        // Save order to the database
        $order = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'total_price' => $totalPrice,
        ]);

        // Save order items
        foreach ($cart as $product) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
            ]);
        }

        // Clear the cart from the session
        session()->forget('cart');

        // Display a success message and redirect to the homepage or thank you page
        return redirect()->route('home')->with('success', 'Thanks for placing your order! It will be delivered soon.');
    }
}