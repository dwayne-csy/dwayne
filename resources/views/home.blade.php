@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Welcome to StyleSphere</h1>

    <!-- Cart Section -->
    <div class="d-flex justify-content-between mb-4">
        <div>
            <a href="{{ route('cart.index') }}" class="btn btn-info">
                Cart ({{ auth()->user()->cart->count() }})  <!-- Display the number of products in the cart -->
            </a>
        </div>
        <div>

        </div>
    </div>

    <div class="row">
        @if($products->count() > 0)
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->product_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <p class="card-text"><strong>Supplier:</strong> {{ $product->supplier->brand_name ?? 'No Supplier' }}</p>
                            <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ number_format($product->sell_price, 2) }}</p>
                            
                            <!-- Add to Cart Button -->
                            <div class="d-flex gap-2">
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <p class="text-center">No products available.</p>
            </div>
        @endif
    </div>
</div>
@endsection
