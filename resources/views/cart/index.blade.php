@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th> <!-- Display sell_price here -->
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $product)
                    <tr>
                        <td>{{ $product->product->name }}</td>
                        <td>
                            <form action="{{ route('cart.update', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $product->quantity }}" min="1" class="form-control" style="width: 80px;">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </form>
                        </td>
                        <td>${{ number_format($product->product->sell_price, 2) }}</td> <!-- Display sell_price as Price -->
                        <td>${{ number_format($product->quantity * $product->product->sell_price, 2) }}</td> <!-- Calculate total using sell_price -->
                        <td>
                            <form action="{{ route('cart.remove', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <h3>Total: ${{ number_format($cartItems->sum(fn($product) => $product->quantity * $product->product->sell_price), 2) }}</h3>
        </div>
    @endif
</div>
@endsection