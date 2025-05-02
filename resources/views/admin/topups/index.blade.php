@extends('admin.layouts.admin')
@section('title', 'Top-Up Products')
@section('content')

<div class="container mt-4">

    <div class="form-group">
        <a href="{{ route('topups.create') }}">
            <button type="submit" class="btn btn-light btn-round px-5"><i class="icon-lock"></i> Add Product</button>
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Game</th>
                <th>Product Name</th>
                <th>Amount</th>
                <th>Price (BDT/USD)</th>
                <th>Delivery Time</th>
                <th>Instructions</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($topups as $topup)
                <tr>
                    <td>{{ $topup->id }}</td>
                    <td>{{ $topup->game->name ?? 'N/A' }}</td>
                    <td>{{ $topup->product_name }}</td>
                    <td>{{ $topup->amount }}</td>
                    <td>{{ $topup->price }}</td>
                    <td>{{ $topup->delivery_time }}</td>
                    <td>{{ Str::limit($topup->instructions, 30) }}</td>
                    <td>
                        <form action="{{ route('topups.destroy', $topup->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
