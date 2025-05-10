@extends('admin.layouts.admin')
@section('title', 'Create Top-Up Product')
@section('content')
<h2 class="text-xl font-bold mb-4">Add New Top-Up Product</h2>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="game_id" class="block">Game</label>
        <select name="game_id" id="game_id" class="form-select" required>
            @foreach ($games as $game)
                <option value="{{ $game->id }}">{{ $game->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="product_name" class="block">Product Name</label>
        <input type="text" name="product_name" id="product_name" class="form-input" required>
    </div>

    <div class="mb-4">
        <label for="amount" class="block">Amount</label>
        <input type="number" name="amount" id="amount" class="form-input" required>
    </div>

    <div class="mb-4">
        <label for="price" class="block">Price</label>
        <input type="number" name="price" id="price" class="form-input" required>
    </div>

    <div class="mb-4">
        <label for="delivery_time" class="block">Delivery Time</label>
        <input type="text" name="delivery_time" id="delivery_time" class="form-input" required>
    </div>

    <div class="mb-4">
        <label for="instructions" class="block">Instructions</label>
        <textarea name="instructions" id="instructions" class="form-textarea" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save Product</button>
</form>
@endsection
