@extends('admin.layouts.admin')
@section('title', 'Banner')
@section('content')
<h2 class="text-xl font-bold mb-4">Orders</h2>

<table class="table-auto w-full">
    <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Game</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->game->name }}</td>
            <td>{{ $order->product->product_name }}</td>
            <td>{{ $order->amount }} BDT</td>
            <td>{{ $order->status }}</td>
            <td>
                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a>
                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this order?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection