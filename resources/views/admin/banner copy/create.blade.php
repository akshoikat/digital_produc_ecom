@extends('admin.layouts.admin')
@section('title', 'Create Top-Up Product')
@section('content')

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Create New Top-Up Product</div>
                    <hr>

                    <form action="{{ route('topups.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="game_id">Game</label>
                                    <select name="game_id" class="form-control" required>
                                        <option value="">Select Game</option>
                                        @foreach($games as $game)
                                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" class="form-control form-control-rounded" id="product_name" name="product_name" placeholder="Enter Product Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" class="form-control form-control-rounded" id="amount" name="amount" placeholder="Enter Amount" required>
                                </div>
                            </div>

                            <!-- Column 2 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control form-control-rounded" id="price" name="price" placeholder="Enter Price" required>
                                </div>
                                <div class="form-group">
                                    <label for="delivery_time">Delivery Time</label>
                                    <input type="text" class="form-control form-control-rounded" id="delivery_time" name="delivery_time" placeholder="Enter Delivery Time" required>
                                </div>
                                <div class="form-group">
                                    <label for="instructions">Instructions</label>
                                    <textarea class="form-control form-control-rounded" id="instructions" name="instructions" rows="3" placeholder="Enter Instructions"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-light btn-round px-5">
                                <i class="icon-lock"></i> Save Product
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
