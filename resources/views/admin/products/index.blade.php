@extends('layouts.web')
@section('title', 'Products - Admin')

@section('content')
<div class="container mt-5">

    <!-- Navigation Links -->
    <div class="mb-4">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-success me-2">
                <i class="fas fa-home me-2"></i> Go to Dashboard
            </a>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-danger">
                <i class="fas fa-tags me-2"></i> Go to Categories
            </a>
    </div>

    <h1 class="text-center mb-4">Products</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Product Button -->
    <div class="mb-3">
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New Product</a>
    </div>

    <!-- Products Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" height="50" width="50" class="img-fluid rounded">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td>{{ $product->category->name }}</td>
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
    </div>

    <!-- Button to scroll back to the top of the page -->
    <button id="goTopBtn" class="go-top btn btn-info">
        <i class="fas fa-arrow-up"></i>
    </button>

</div>
@endsection
