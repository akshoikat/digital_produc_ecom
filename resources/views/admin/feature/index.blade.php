@extends('admin.layouts.admin')
@section('title', 'Banner')
@section('content')

<div class="container mt-4">

    
    <!-- Banner Create Form -->
  

    <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              
              <th scope="col">title</th>
              <th scope="col">description</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($features as $feature)
            <tr>
              
              <td>{{ $feature->title }}</td>
              <td>{{ $feature->description }}</td>

              <td>
                <form action="{{ route('features.destroy', $feature->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this feature?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
            

          </tbody>
        </table>
        <div class="form-group">
          <a href="{{ route('features.create') }}">
              <button type="submit" class="btn btn-light btn-round px-5"><i class="icon-lock"></i> Add Banner</button>
          </a>
      </div>
      </div>
      </div>
    </div>
  </div>

</div>





@endsection