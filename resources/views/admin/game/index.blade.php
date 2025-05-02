@extends('admin.layouts.admin')
@section('title', 'Banner')
@section('content')

<div class="container mt-4">

    <div class="form-group">
        <a href="{{ route('games.create') }}">
            <button type="submit" class="btn btn-light btn-round px-5"><i class="icon-lock"></i> Add Game</button>
        </a>
      </div>
    <!-- Banner Create Form -->
  

    <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">name</th>
              
              <th scope="col">image_path</th>
              <th scope="col">regular_price</th>
              <th scope="col">discount_percentage</th>
              <th scope="col">sale_price</th>
              <th scope="col">Action</th>
              <th scope="col">description</th>
              
            </tr>
          </thead>
          <tbody>
            
            @foreach ($games as $game)
            <tr>
              <th scope="row">{{ $game->id }}</th>
              <td>{{ $game->name }}</td>
              
              <td><img src="{{ $game->image_path}}" alt="Game Image" width="100"></td>
              <td>{{ $game->regular_price }}</td>
              <td>{{ $game->discount_percentage }}</td>
              <td>{{ $game->sale_price }}</td>
              <td>
                <form action="{{ route('games.destroy', $game->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Games?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
              <td>{{ $game->description }}</td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>

</div>

@endsection