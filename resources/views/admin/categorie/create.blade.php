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

                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Catagory Name</label>
                                    <input type="text" class="form-control form-control-rounded" id="name" name="name" placeholder="Enter Game Name" required>
                                </div>
                               
                          
                                
                                
                            </div>

                            

                            
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-light btn-round px-5">
                                <i class="icon-lock"></i> Save 
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