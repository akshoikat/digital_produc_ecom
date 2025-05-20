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
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'game_uid' => 'required',
            'sender_number' => 'required',
            'transaction_id' => 'required',
            'paymentMethod' => 'required',
            'product_id' => 'required|exists:products,id',
            'game_id' => 'required|exists:games,id',
            'price' => 'required|numeric'
        ]);

        $validated = Order::create([
            'email' => $validated['email'],
            'game_uid' => $validated['game_uid'],
            'sender_number' => $validated['sender_number'],
            'transaction_id' => $validated['transaction_id'],
            'payment_method' => $validated['paymentMethod'],
            'product_id' => $validated['product_id'],
            'game_id' => $validated['game_id'],
            'price' => $validated['price'],
        ]);

        return response()->json(['message' => 'Order placed successfully!']);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order status updated');
    }



    
    // Delete order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted');
    }
}
