<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;  
use App\Models\Order;  
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if(auth()->user()->email != 'admin@example.com'){
            // Redirect non-admin users to home or show an error message
            return redirect('/home')->with('error', 'You do not have admin access.');
        }

        // If user is admin, show the admin dashboard or perform admin actions
        // Get counts from the database
        $categoryCount = Category::count();
        $productCount = Product::count();
        $orderCount = Order::count(); 
        return view('admin.dashboard',compact('categoryCount', 'productCount', 'orderCount'));
    }

    public function manageProducts()
    {
        if(auth()->user()->email != 'admin@example.com'){
            return redirect('/home')->with('error', 'You do not have admin access.');
        }

        // Perform admin-specific actions like displaying products
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function manageCategories()
    {
        if(auth()->user()->email != 'admin@example.com'){
            return redirect('/home')->with('error', 'You do not have admin access.');
        }

        // Retrieve all categories from the database
        $categories = Category::all();

        // Return the view with the categories data
        return view('admin.categories.index', compact('categories'));
    }
}

