@extends('layouts.web')

@section('title', 'Checkout')

@section('content')
    <div class="container">
    <section class="hero text-center">
        <div class="hero-text">
            <h1>Checkout</h1>
            
        </div>
        <div class="hero-image">
            <img src="{{ asset('img/banner.png') }}" class="img-fluid" alt="Hero Image">
        </div>
    </section>

        
        <!-- Cart summary -->
        <div class="row">
            <div class="col-md-8">
                <h4>Your Cart</h4>
                @if(session('cart') && count(session('cart')) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach(session('cart') as $id => $product)
                                <tr>
                                    <td>{{ $product['name'] }}</td>
                                    <td>{{ $product['price'] }}</td>
                                    <td>{{ $product['quantity'] }}</td>
                                    <td>{{ $product['price'] * $product['quantity'] }}</td>
                                </tr>
                                @php $total += $product['price'] * $product['quantity']; @endphp
                            @endforeach
                        </tbody>
                    </table>

                    <h5>Total Price: {{ $total }}</h5>
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>
            
            <!-- Checkout form -->
            <div class="col-md-4">
                <h4>Shipping Information</h4>
                <form method="POST" action="{{ route('checkout.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Shipping Address</label>
                        <textarea name="address" id="address" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success mt-3 w-100">Complete Order</button>
                </form>
            </div>
        </div>
    </div>
@endsection
