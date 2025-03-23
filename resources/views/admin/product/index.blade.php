@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Back Button -->
    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <h1>Products</h1>
    <a href="{{ route('admin.product.create') }}" class="btn btn-success">Add Product</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Supplier</th>
                <th>Size</th>
                <th>Category</th>
                <th>Type</th>
                <th>Cost Price</th>
                <th>Sell Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->supplier->brand_name }}</td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->types }}</td>
                    <td>{{ $product->cost_price }}</td>
                    <td>{{ $product->sell_price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('admin.product.edit', $product->product_id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.product.destroy', $product->product_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection