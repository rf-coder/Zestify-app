@extends('layouts.web')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-5">
    <!-- User View Button (Top Right) -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('home') }}" class="btn btn-danger shadow">
            <i class="fas fa-home me-2"></i> Go to User View
        </a>
    </div>

    <!-- Hero Section -->
    <section class="hero p-5 text-center rounded shadow" style="background: linear-gradient(to right, #f7f8fc, #e3e4e8);">
        <div class="hero-text">
            <h1 class="display-4 fw-bold">Welcome to the Admin Dashboard</h1>
            <p class="lead text-muted">Your control center for managing products, categories, and orders efficiently.</p>
        </div>
        <div class="hero-image mt-4">
            <img src="{{ asset('img/banner.png') }}" class="img-fluid rounded shadow" alt="Hero Image" style="max-width: 80%;">
        </div>
    </section>

    <!-- Stats Section -->
    <div class="row my-5 text-center">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm py-4">
                <i class="fas fa-boxes fa-3x text-primary"></i>
                <h3 class="mt-3">{{ $productCount ?? 0 }}</h3>
                <p class="text-muted">Products</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm py-4">
                <i class="fas fa-tags fa-3x text-success"></i>
                <h3 class="mt-3">{{ $categoryCount ?? 0 }}</h3>
                <p class="text-muted">Categories</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm py-4">
                <i class="fas fa-shopping-cart fa-3x text-warning"></i>
                <h3 class="mt-3">{{ $orderCount ?? 0 }}</h3>
                <p class="text-muted">Orders</p>
            </div>
        </div>
    </div>

    <!-- Quick Links Section -->
    <div class="row g-4 justify-content-center">
        <!-- Manage Products Button -->
        <div class="col-md-4">
            <a href="{{ route('admin.products.index') }}" class="card shadow-lg text-decoration-none">
                <div class="card-body text-center">
                    <i class="fas fa-boxes fa-3x text-primary"></i>
                    <h5 class="card-title mt-3">Manage Products</h5>
                    <p class="card-text text-muted">Add, update, or delete products.</p>
                </div>
            </a>
        </div>

        <!-- Manage Categories Button -->
        <div class="col-md-4">
            <a href="{{ route('admin.categories.index') }}" class="card shadow-lg text-decoration-none">
                <div class="card-body text-center">
                    <i class="fas fa-tags fa-3x text-success"></i>
                    <h5 class="card-title mt-3">Manage Categories</h5>
                    <p class="card-text text-muted">Organize products into categories.</p>
                </div>
            </a>
        </div>

        <!-- View Orders Button -->
        <div class="col-md-4">
            <a href="{{ route('admin.orders.index') }}" class="card shadow-lg text-decoration-none">
                <div class="card-body text-center">
                    <i class="fas fa-shopping-cart fa-3x text-warning"></i>
                    <h5 class="card-title mt-3">View Orders</h5>
                    <p class="card-text text-muted">Track and manage customer orders.</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
