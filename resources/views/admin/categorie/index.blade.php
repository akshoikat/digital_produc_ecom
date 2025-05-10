@extends('admin.layouts.admin')
@section('title', 'Banner')
@section('content')
<h2 class="text-xl font-bold mb-4">Categories</h2>
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-4">Add New Category</a>

<table class="table-auto w-full">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td><img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="100"></td>
            <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this category?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection