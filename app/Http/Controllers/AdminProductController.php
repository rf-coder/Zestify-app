<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    // Show the form to create a new product
    public function create()
    {
        $categories = Category::all(); // Get all categories for the dropdown
        return view('admin.products.create', compact('categories'));
    }

    // Store a new product in the database
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096', // Image validation
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public'); // Store in 'public/products'
        }

        // Create the product
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath, // Store the image path in the database
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    // Show a list of all products
    public function index()
    {
        $products = Product::with('category')->get(); // Eager load category data for each product
        return view('admin.products.index', compact('products'));
    }

    // Show the form to edit an existing product
    public function edit(Product $product)
    {
        $categories = Category::all(); // Get all categories for the dropdown
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Update an existing product in the database
    public function update(Request $request, Product $product)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        // Handle image upload
        $imagePath = $product->image; // Keep the old image path if no new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($imagePath && Storage::exists('public/' . $imagePath)) {
                Storage::delete('public/' . $imagePath);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Update the product
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath, // Update the image path
        ]);
        $product->save();


        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    // Show a single product's details
    public function show(Product $product)
    {
        return view('admin.products.view', compact('product'));
    }

    // Delete a product from the database
    public function destroy(Product $product)
    {
        // Delete the product image from storage if it exists
        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        // Delete the product from the database
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
