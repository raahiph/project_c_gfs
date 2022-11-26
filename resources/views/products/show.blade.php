@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">

            <!-- Header -->
            <div class="header mt-md-5">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                               Show
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                                {{ trans('cruds.products.title_singular') }}
                            </h1>

                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>

            <!-- Card -->
            <div class="card">
                <div class="card-body">





                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$product->name}}" disabled>

                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="email">Code</label>
                            <input type="text" class="form-control" name="code" placeholder="Code" value="{{$product->code}}" disabled>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="mobile">Unit Type</label>
                            <input type="text" class="form-control" name="code" placeholder="Code" value="{{$product->unit_type_id}}" disabled>

                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="address">Unit</label>
                            <input type="text" class="form-control" name="units" placeholder="unit" value="{{$product->unit}}" required>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="gender">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Price" value="{{$product->pice}}" required>

                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label for="mobile">Category</label>
                            <input type="number" class="form-control" name="price" placeholder="Price" value="{{$product->category_id}}" required>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label for="mobile">Supplier</label>
                            <input type="number" class="form-control" name="price" placeholder="Price" value="{{$product->supplier_id}}" required>

                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="address">Image</label>
                            <img src="{{ asset('images/'.$product->image) }}" alt="job image" title="job image" height="100px" width="100px">


                        </div>
                    </div>
                    <br>
                    <!-- Button -->
                    <a href="{{url('products') }}" class="btn btn-block btn-primary" type="submit">Back </a>

                </div>
            </div>
        </div>

    </div>
</div> <!-- / .row -->




@endsection
