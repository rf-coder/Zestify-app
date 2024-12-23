@extends('layouts.web')

@section('title', 'View Orders')

@section('content')
<div class="container mt-5">
    <div class="mb-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger me-2">
            <i class="fas fa-home me-2"></i> Go to Dashboard
        </a>
        <a href="{{ route('admin.products.index') }}" class="btn btn-primary">
            <i class="fas fa-boxes me-2"></i> Go to Products
        </a>
        <a href="{{ route('admin.products.index') }}" class="btn btn-success">
            <i class="fas fa-tags me-2"></i> Go to Categories
        </a>
    </div>

    <h1 class="text-center mb-4">Orders</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Orders Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Total Price</th>
                    <th>Order Date</th>
                    <th>Items Ordered</th> <!-- New Column for Items Ordered -->
                    
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                        <td>
                            <!-- Display Ordered Items Inline -->
                            @foreach($order->items as $item)
                                {{ $item->product_name }} x{{ $item->quantity }}
                                @if(!$loop->last), @endif
                            @endforeach
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        {{ $orders->links() }}
    </div>
</div>
@endsection
