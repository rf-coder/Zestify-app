<?php

namespace App\Http\Controllers;

use App\Models\Product;  // Import Product model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch featured products (you can customize this to show specific products)
        $featuredProducts = Product::inRandomOrder()->limit(3)->get();

        return view('student.index', compact('featuredProducts'));
    }
}


