@extends('admin.layouts.admin')
@section('title', 'Top-Up Products')
@section('content')

<div class="container mt-4">
    <!-- Button to Add New Product -->
    <div class="form-group">
        <a href="{{ route('topups.create') }}">
            <button type="submit" class="btn btn-light btn-round px-5">
                <i class="icon-lock"></i> Add Top-Up Product
            </button>
        </a>
    </div>

    <!-- Top-Up Products Table -->
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Game</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price (BDT/USD)</th>
                    <th scope="col">Delivery Time</th>
                    <th scope="col">Instructions</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topups as $topup)
                    <tr>
                        <th scope="row">{{ $topup->id }}</th>
                        <td>{{ $topup->game->name }}</td> <!-- Displaying Game Name -->
                        <td>{{ $topup->product_name }}</td>
                        <td>{{ $topup->amount }}</td>
                        <td>{{ $topup->price }}</td>
                        <td>{{ $topup->delivery_time }}</td>
                        <td>{{ $topup->instructions ?? 'N/A' }}</td> <!-- If no instructions, display N/A -->
                        <td>
                           

                            <form action="{{ route('topups.destroy', $topup->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
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
