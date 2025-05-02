@extends('admin.layouts.admin')
@section('title', 'Game Create')
@section('content')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Create New Game</div>
                    <hr>

                    <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Game Name</label>
                                    <input type="text" class="form-control form-control-rounded" id="name" name="name" placeholder="Enter Game Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Select Category</label>
                                    <select class="form-control form-control-rounded" id="category_id" name="category_id" required>
                                        <option value="">-- Choose Category --</option>
                                        @foreach ($catagorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    <div class="form-group">
                                    <label for="regular_price">Regular Price</label>
                                    <input type="number" step="0.01" class="form-control form-control-rounded" id="regular_price" name="regular_price" placeholder="Enter Regular Price">
                                </div>

                                <div class="form-group">
                                    <label for="discount_percentage">Discount Percentage (%)</label>
                                    <input type="number" step="0.01" class="form-control form-control-rounded" id="discount_percentage" name="discount_percentage" placeholder="Enter Discount Percentage">
                                </div>

                                <div class="form-group">
                                    <label for="sale_price">Sale Price</label>
                                    <input type="number" step="0.01" class="form-control form-control-rounded" id="sale_price" name="sale_price" placeholder="Enter Sale Price">
                                </div>

                            </div>
                            <!-- Column 3 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="description">Short Description</label>
                                    <textarea class="form-control form-control-rounded" id="description" name="description" rows="3" placeholder="Enter Short Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="full_description">Full Description</label>
                                    <textarea class="form-control form-control-rounded" id="full_description" name="full_description" rows="5" placeholder="Enter Full Description"></textarea>
                                </div>
                                
                            </div>

                            <!-- Column 2 -->
                            <div class="col-md-4">
                                

                                <div class="form-group">
                                    <label for="image_path">Game Image</label>
                                    <input type="file" class="form-control form-control-rounded" id="image_path" name="image_path">
                                </div>
                            </div>

                            
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-light btn-round px-5">
                                <i class="icon-lock"></i> Save Game
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<script>

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>
@endsection