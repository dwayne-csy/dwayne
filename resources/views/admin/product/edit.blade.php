@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('admin.product.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Supplier</label>
            <select name="supplier_id" class="form-control" required>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->supplier_id }}" {{ $product->supplier_id == $supplier->supplier_id ? 'selected' : '' }}>{{ $supplier->brand_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Size</label>
            <select name="size" class="form-control" required>
                <option value="XS" {{ $product->size == 'XS' ? 'selected' : '' }}>XS</option>
                <option value="S" {{ $product->size == 'S' ? 'selected' : '' }}>S</option>
                <option value="M" {{ $product->size == 'M' ? 'selected' : '' }}>M</option>
                <option value="L" {{ $product->size == 'L' ? 'selected' : '' }}>L</option>
                <option value="XL" {{ $product->size == 'XL' ? 'selected' : '' }}>XL</option>
                <option value="XXL" {{ $product->size == 'XXL' ? 'selected' : '' }}>XXL</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-control" required>
                <option value="Mens" {{ $product->category == 'Mens' ? 'selected' : '' }}>Mens</option>
                <option value="Womens" {{ $product->category == 'Womens' ? 'selected' : '' }}>Womens</option>
                <option value="Kids" {{ $product->category == 'Kids' ? 'selected' : '' }}>Kids</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Cost Price</label>
            <input type="number" name="cost_price" class="form-control" value="{{ $product->cost_price }}" step="0.01" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Sell Price</label>
            <input type="number" name="sell_price" class="form-control" value="{{ $product->sell_price }}" step="0.01" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
