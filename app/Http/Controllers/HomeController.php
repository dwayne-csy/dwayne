<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application homepage with products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch all products from the database
        $products = Product::with('supplier')->get(); // Eager load the supplier relationship

        // Pass the products to the home view
        return view('home', compact('products'));
    }
}