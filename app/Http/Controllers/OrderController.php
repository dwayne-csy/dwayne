<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display all orders
    public function index()
    {
        $orders = Order::with('user', 'orderLines.product')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Accept an order
    public function accept($id)
    {
        $order = Order::findOrFail($id);
    
        // Only allow accepting pending orders
        if ($order->status === 'pending') {
            $order->update(['status' => 'accepted']);
            return redirect()->route('admin.orders.index')->with('success', 'Order accepted successfully!');
        }
    
        return redirect()->route('admin.orders.index')->with('error', 'Only pending orders can be accepted.');
    }
    
    public function cancel($id)
    {
        $order = Order::findOrFail($id);
    
        // Only allow cancelling pending orders
        if ($order->status === 'pending') {
            $order->update(['status' => 'cancelled']);
            return redirect()->route('admin.orders.index')->with('success', 'Order cancelled successfully!');
        }
    
        return redirect()->route('admin.orders.index')->with('error', 'Only pending orders can be cancelled.');
    }
}