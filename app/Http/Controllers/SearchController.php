<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // Search for products by name or filter by categories
    public function search(Request $request)
    {
        $query = $request->get('query');

        $products = Product::where('name', 'LIKE', '%' . $query . '%')
        ->orWhere('description', 'LIKE', '%' . $query . '%')
        ->get();

        return view('student.products', compact('products'));
    }

}
