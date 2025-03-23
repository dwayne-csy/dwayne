@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Suppliers</h1>
    <a href="{{ route('admin.supplier.create') }}" class="btn btn-success">Add Supplier</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Brand Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supplier as $supplier)
                <tr>
                    <td>{{ $supplier->supplier_id }}</td>
                    <td>{{ $supplier->brand_name }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>
                        <a href="{{ route('admin.supplier.edit', $supplier->supplier_id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.supplier.destroy', $supplier->supplier_id) }}" method="POST" class="d-inline">
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