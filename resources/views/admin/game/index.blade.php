@extends('admin.layouts.admin')
@section('title', 'Banner')
@section('content')
<h2 class="text-xl font-bold mb-4">Games</h2>
<a href="{{ route('games.create') }}" class="btn btn-primary mb-4">Add New Game</a>

<table class="table-auto w-full">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Logo</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($games as $game)
        <tr>
            <td>{{ $game->name }}</td>
            <td>{{ $game->category->name }}</td>
            <td><img src="{{ asset('storage/' . $game->logo) }}" alt="Game Logo" width="50"></td>
            <td>{{ $game->description }}</td>
            <td>
                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-info btn-sm">Edit</a>
                <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this game?')" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection