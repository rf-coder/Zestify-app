@extends('layouts.web')
@section('title', $product->name)

@section('content')
    <div class="container my-5">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6 mb-4">
                <img src="{{ asset('storage/' .$product->image) }}" class="img-fluid" alt="{{ $product->name }}" style="max-width: 100%; height: auto; max-height: 400px;">
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p class="text-muted">Category: {{ $product->category->name }}</p>
                <p>{{ $product->description }}</p>
                <h3>Rs. {{ number_format($product->price, 2) }}/-</h3>
                

                <!-- Button to View Reviews -->
                <a href="#" class="btn btn-info mt-3">See Reviews</a>
            </div>
        </div>

        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to Products</a>
        </div>

        <!-- Admin Actions -->
        <div class="card-footer text-right">
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
