<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display all orders
    public function index()
    {
        if(auth()->user()->email != 'admin@example.com'){
            // Redirect non-admin users to home or show an error message
            return redirect('/home')->with('error', 'You do not have admin access.');
        }
        // Retrieve all orders with pagination
        $orders = Order::paginate(10); // Adjust pagination as needed

        return view('admin.orders.index', compact('orders'));
    }
    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('admin.orders.show', compact('order')); // Ensure the Blade view exists
    }
    

}
