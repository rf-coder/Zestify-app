@extends('layouts.web')
@section('title', $product->name)

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' .$product->image) }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p class="text-muted">Category: {{ $product->category->name }}</p>
                <p>{{ $product->description }}</p>
                <h3>Rs. {{ $product->price }}/-</h3>
                <form method="POST" action="{{ route('cart.add', $product->id) }}">
    @csrf
    <button type="submit" class="btn btn-primary w-100 d-flex align-items-center">
        <i class="fas fa-shopping-cart me-2"></i>Add to Cart
    </button>
</form>
            </div>
        </div>
    </div>
    <!-- Button to scroll back to the top of the page -->
    <button id="goTopBtn" class="go-top"><i class="fas fa-arrow-up"></i></button>
@endsection
