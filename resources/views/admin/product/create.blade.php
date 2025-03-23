@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Create Product</h1>
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Supplier</label>
            <select name="supplier_id" class="form-control" required>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->supplier_id }}">{{ $supplier->brand_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Size</label>
            <select name="size" class="form-control" required>
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-control" required>
                <option value="Mens">Mens</option>
                <option value="Womens">Womens</option>
                <option value="Kids">Kids</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Type</label>
            <select name="types" class="form-control" required>
                <option value="T-shirt">T-shirt</option>
                <option value="Polo Shirt">Polo Shirt</option>
                <option value="Sweater">Sweater</option>
                <option value="Hoodie">Hoodie</option>
                <option value="Jersey">Jersey</option>
                <option value="Dress">Dress</option>
                <option value="Sweatshirt">Sweatshirt</option>
                <option value="Pants">Pants</option>
                <option value="Shorts">Shorts</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Cost Price</label>
            <input type="number" name="cost_price" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Sell Price</label>
            <input type="number" name="sell_price" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
