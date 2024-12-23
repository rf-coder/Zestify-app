@extends('layouts.web')
@section('title', 'Home') 

@section('content')
    <!-- Hero Section -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <section class="hero text-center">
        <div class="hero-image">
            <img src="{{ asset('img/banner.png') }}" class="img-fluid" alt="Hero Image">
        </div>
        <div class="hero-text">
            <h1>Discover Your Beauty Essentials</h1>
            <p>Shop the latest in skincare, haircare, makeup, and wellness.</p>
            <a href="/products" class="btn btn-primary">Shop Now</a>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="featured-products py-5">
        <div class="container">
            <h2 class="text-center">Featured Products</h2>
            <div class="row">
                @foreach ($featuredProducts as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <!-- Product Image -->
                            <img src="{{ asset('storage/' .$product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <!-- Product Name and Price -->
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">Rs. {{ $product->price }}/-</p>
                                <!-- Add to Cart Button -->
                                <form method="POST" action="{{ route('cart.add', $product->id) }}">
    @csrf
    <button type="submit" class="btn btn-primary w-100 d-flex align-items-center">
        <i class="fas fa-shopping-cart me-2"></i>Add to Cart
    </button>
</form><br>
                                <!-- View Product Button -->
                                <a href="{{ route('product-detail', ['id' => $product->id]) }}" class="btn btn-secondary d-flex align-items-center">
                                    <i class="fas fa-eye me-2"></i> View Product
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <button id="goTopBtn" class="go-top"><i class="fas fa-arrow-up"></i></button>
    </section>
@endsection
