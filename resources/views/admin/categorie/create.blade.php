@extends('admin.layouts.admin')
@section('title', 'Game Create')
@section('content')

<h2 class="text-xl font-bold mb-4">Add New Category</h2>

<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="name" class="block">Category Name</label>
        <input type="text" name="name" id="name" class="form-input" required>
    </div>

    <div class="mb-4">
        <label for="description" class="block">Description</label>
        <textarea name="description" id="description" class="form-textarea"></textarea>
    </div>

    <div class="mb-4">
        <label for="image" class="block">Image (optional)</label>
        <input type="file" name="image" id="image" class="form-input">
    </div>

    <button type="submit" class="btn btn-primary">Save Category</button>
</form>
@endsection