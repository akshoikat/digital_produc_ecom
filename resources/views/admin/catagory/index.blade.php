@extends('admin.layouts.admin')
@section('title', 'Banner')
@section('content')

<div class="container mt-4">

    <div class="form-group">
        <a href="{{ route('catagorys.create') }}">
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
              <th scope="col">description</th>
              <th scope="col">options</th>
              
            </tr>
          </thead>
          <tbody>
            
            @foreach ($catagorys as $cat)
            <tr>
              <th scope="row">{{ $cat->id }}</th>
              <td>{{ $cat->name }}</td>
              <td>{{ $cat->description }}</td>
              <td>
                <form action="{{ route('catagorys.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Games?');">
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
    </div>
  </div>

</div>

@endsection