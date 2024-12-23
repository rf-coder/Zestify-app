@extends('layouts.web')
@section('title', 'Shopping Cart')

@section('content')
<div class="container">
<section class="hero text-center">
        <div class="hero-text">
            <h1>Your Shopping Cart</h1>
            <a href="/products" class="btn btn-primary">Add More Items</a>
        </div>
        <div class="hero-image">
            <img src="{{ asset('img/banner.png') }}" class="img-fluid" alt="Hero Image">
        </div>
    </section>


    @if(session('cart') && count(session('cart')) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $id => $product)
                    <tr>
                        <td>{{ $product['name'] }}</td>
                        <td>Rs.{{ number_format($product['price'], 2) }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>Rs.{{ number_format($product['quantity'] * $product['price'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Total: Rs.{{ number_format($totalPrice, 2) }}</h3>
        <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
