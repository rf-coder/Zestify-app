<!-- resources/views/products/search.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search Results for: "{{ $query }}"</h1>

        @if($products->isEmpty())
            <p>No products found.</p>
        @else
            <ul class="list-group">
                @foreach($products as $product)
                    <li class="list-group-item">
                        <strong>{{ $product->name }}</strong> - {{ $product->category }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
