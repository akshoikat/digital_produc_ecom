@extends('admin.layouts.admin')
@section('title', 'Game Create')
@section('content')
<h2 class="text-xl font-bold mb-4">Add New Game</h2>

<form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="name" class="block">Game Name</label>
        <input type="text" name="name" id="name" class="form-input" required>
    </div>

    <div class="mb-4">
        <label for="category_id" class="block">Category</label>
        <select name="category_id" id="category_id" class="form-select" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="logo" class="block">Game Logo</label>
        <input type="file" name="logo" id="logo" class="form-input" required>
    </div>

    <div class="mb-4">
        <label for="description" class="block">Description</label>
        <textarea name="description" id="description" class="form-textarea" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save Game</button>
</form>
@endsection