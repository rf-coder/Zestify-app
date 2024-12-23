<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    // Show the form to create a new category
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store a new category in the database
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        // Create the category
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    // Show a list of all categories
    public function index()
    {
        $categories = Category::all(); // Get all categories from the database
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form to edit an existing category
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Update an existing category in the database
    public function update(Request $request, Category $category)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        // Update the category
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    // Show the details of a single category
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    // Delete a category from the database
    public function destroy(Category $category)
    {
        // Delete the category from the database
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
