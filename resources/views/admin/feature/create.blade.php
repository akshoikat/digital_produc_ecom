@extends('admin.layouts.admin')
@section('title', 'Banner create')
@section('content')
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Create New Feature</div>
                    <hr>

                    <form action="{{ route('features.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Feature Title</label>
                                    <input type="text" class="form-control form-control-rounded" id="title" name="title" placeholder="Enter Feature Title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Column 2 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Feature Description</label>
                                    <textarea class="form-control form-control-rounded" id="description" name="description" placeholder="Enter Feature Description" rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-light btn-round px-5">
                                <i class="icon-lock"></i> Save Feature
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection