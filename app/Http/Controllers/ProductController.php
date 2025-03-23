<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Corrected variable name
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $suppliers = Supplier::all(); // Corrected variable name
        return view('admin.product.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('admin.product.index')->with('success', 'Product added successfully.');
    }

    public function edit(Product $product)
    {
        $suppliers = Supplier::all(); // Corrected variable name
        return view('admin.product.edit', compact('product', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
    }
}
