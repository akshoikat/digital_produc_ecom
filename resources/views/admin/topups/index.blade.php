@extends('admin.layouts.admin')
@section('title', 'Top-Up Products')
@section('content')
<h2 class="text-xl font-bold mb-4">Top-Up Products</h2>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Add New Product</a>

<table class="table-auto w-full">
    <thead>
        <tr>
            <th>Game</th>
            <th>Product Name</th>
            <th>Amount</th>
            <th>Price</th>
            <th>Delivery Time</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($topUpProducts as $topUpProduct)
        <tr>
            <td>{{ $topUpProduct->game->name }}</td>
            <td>{{ $topUpProduct->product_name }}</td>
            <td>{{ $topUpProduct->amount }}</td>
            <td>{{ $topUpProduct->price }} BDT</td>
            <td>{{ $topUpProduct->delivery_time }}</td>
            <td>
                <a href="{{ route('products.edit', $topUpProduct->id) }}" class="btn btn-info btn-sm">Edit</a>
                <form action="{{ route('products.destroy', $topUpProduct->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this product?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
