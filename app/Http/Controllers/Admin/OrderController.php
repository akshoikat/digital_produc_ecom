<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Show all orders
    public function index()
    {
        $orders = Order::with(['user', 'game', 'product'])->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Show order details
    public function show($id)
    {
        $order = Order::with(['user', 'game', 'product'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Update order status (complete/cancel)
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated');
    }

    // Delete order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted');
    }
}
