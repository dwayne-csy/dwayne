@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Welcome to StyleSphere</h1>

    <!-- Navigation and Cart Section -->
    <div class="d-flex justify-content-between mb-4">
        <!-- Hamburger Profile Menu (Left) -->
        <div>
            <div class="dropdown">
                <button class="btn btn-outline-secondary" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bars"></i> <!-- Hamburger icon -->
                </button>
                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user-edit me-2"></i>Edit Profile</a></li>
                    <!-- Add more menu items here if needed -->
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Shopping Cart (Right) -->
        <div>
            <a href="{{ route('cart.index') }}" class="btn btn-outline-info position-relative">
                <i class="fas fa-shopping-bag"></i>
                @if(auth()->user()->cart->count() > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ auth()->user()->cart->count() }}
                </span>
                @endif
            </a>
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

@section('scripts')
<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Bootstrap JS for dropdown functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
@endsection