<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('student.products', compact('products'));
    }

    // Filter products by category
    public function category($categoryName)
    {
        // Find the category by name
        $category = Category::where('name', $categoryName)->first();


        // Get products that belong to this category
        $products = Product::where('category_id', $category->id)->get();
        // Pass the category and products to the view
        return view('student.products', compact('category', 'products'));
    }

    // Show a single product
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('student.product_detail', compact('product'));
    }

    // Handle search request
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();
        
        return response()->json(view('student.product-list', compact('products'))->render());
    }
}
