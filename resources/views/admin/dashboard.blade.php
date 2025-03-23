@extends('layouts.app')

@section('content')

@if(auth()->user()->roles === 'admin')
    <!-- Admin Dashboard Link -->
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Admin Dashboard</a>
@else
    <div class="container">
        <a href="{{ route('admin.supplier.index') }}" class="btn btn-primary">MANAGE SUPPLIERS</a>
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">MANAGE PRODUCTS</a>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">MANAGE USERS</a>
    </div>
@endif

@endsection
