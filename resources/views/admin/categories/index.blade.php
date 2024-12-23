@extends('layouts.web')
@section('title', 'Categories')

@section('content')
<div class="container mt-5">

    <!-- Top Navigation Buttons -->
    <div class="mb-4">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-success me-2">
                <i class="fas fa-home me-2"></i> Go to Dashboard
            </a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-danger">
                <i class="fas fa-boxes me-2"></i> Go to Products
            </a>
    </div>

    <!-- Header -->
    <h1 class="text-center mb-4">Categories</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-3">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New Category</a>
    </div>
    <!-- Categories Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ Str::limit($category->description, 126) }}</td>
                        <td>
                            <!-- View Button -->
                            <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-info btn-sm d-inline-flex align-items-center">
                                <i class="fas fa-eye me-1"></i> View
                            </a>

                            <!-- Edit Button -->
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm d-inline-flex align-items-center">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
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


</div>
@endsection
