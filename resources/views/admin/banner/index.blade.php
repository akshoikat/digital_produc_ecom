@extends('admin.layouts.admin')
@section('title', 'Banner')
@section('content')




<div class="container mt-4">

    <div class="form-group">
        <a href="{{ route('banners.create') }}">
            <button type="submit" class="btn btn-light btn-round px-5"><i class="icon-lock"></i> Add Banner</button>
        </a>
      </div>
    <!-- Banner Create Form -->
  

    <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">IMAGE</th>
              <th scope="col">PRICE</th>
              <th scope="col">Short TITTLE</th>
              <th scope="col">TITTLE</th>
              <th scope="col">SUBTITTLE</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($banners as $banner)
            <tr>
              <th scope="row">{{ $banner->id }}</th>
              <td><img src="{{ $banner->hero_image }}" alt="Game Image" width="100"></td>
              <td>{{ $banner->price }}</td>
              <td>{{ $banner->cta_button_text }}</td>
              <td>{{ $banner->hero_title }}</td>
              <td>{{ $banner->hero_subtitle }}</td>
              <td>
                <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Banner?');">
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