@extends('layouts.web')
@section('title', 'Category Details') 

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Category Details</h1>

    <!-- Display Category Information -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="text-primary">{{ $category->name }}</h3>
            <p><strong>Description:</strong> {{ $category->description }}</p>
        </div>
    </div>

    <!-- Products in This Category -->
    <h4 class="text-secondary mb-3">Products in this Category</h4>

    @if($category->products->count() > 0)
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category->products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' .$product->image) }}" alt="{{ $product->name }}" width="50" height="50" class="rounded">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description}}</td>
                        <td>Rs.{{ number_format($product->price, 2) }}</td>
                        <td>
                            <!-- View Button -->
                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm d-inline-flex align-items-center">
                                <i class="fas fa-eye me-1"></i> View
                            </a>

                            <!-- Edit Button -->
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm d-inline-flex align-items-center">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash-alt me-1"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center text-muted">No products in this category.</p>
    @endif

    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left me-2"></i> Back to Categories
    </a>
</div>
@endsection
