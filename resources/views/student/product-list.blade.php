@foreach ($products as $product)
<div class="col-md-4 mb-4">
    <div class="card">
        <img src="{{ asset('storage/' .$product->image) }}" class="card-img-top" alt="{{ $product->name }}">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">Rs. {{ $product->price }}/-</p>
            <a href="{{ route('product-detail', $product->id) }}" class="btn btn-primary">View Product</a>
        </div>
    </div>
</div>
@endforeach
