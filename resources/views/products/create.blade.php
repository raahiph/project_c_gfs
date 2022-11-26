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
                                Add a new
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
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif


                    <!-- Form -->
                    <form class="mb-4" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}" required>
                                @if ($errors->has('name'))
                                <span class="alert alert-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="email">Code</label>
                                <input type="text" class="form-control" name="code" placeholder="Code" value="{{old('code')}}" required>
                                @if($errors->has('code'))
                                <div class="alert alert-danger">{{ $errors->first('code') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="mobile">Unit Type</label>
                                <select class="form-control" name="unit_type_id">
                                    <option disabled selected>--Select Option--</option>
                                    @foreach($unitType as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>

                                    @endforeach
                                    @if($errors->has('unit_type_id'))
                                    <div class="alert alert-danger">{{ $errors->first('unit_type_id') }}</div>
                                    @endif
                                </select>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Unit</label>
                                <input type="number" class="form-control" name="units" placeholder="unit" value="{{old('units')}}" required>
                                @if($errors->has('units'))
                                <div class="alert alert-danger">{{ $errors->first('units') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="gender">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Price" value="{{old('Price')}}" required>
                                @if($errors->has('price'))
                                <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                                @endif
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label for="mobile">Category</label>
                                <select class="form-control" name="category_id">
                                    <option disabled selected>--Select Option--</option>
                                    @foreach($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                    @if($errors->has('category_id'))
                                    <div class="alert alert-danger">{{ $errors->first('category_id') }}</div>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="mobile">Supplier</label>
                                <select class="form-control" name="supplier_id">
                                    <option disabled selected>--Select Option--</option>
                                    @foreach($supplier as $sup)
                                    <option value="{{$sup->id}}">{{$sup->name}}</option>
                                    @endforeach
                                    @if($errors->has('supplier_id'))
                                    <div class="alert alert-danger">{{ $errors->first('supplier_id') }}</div>
                                    @endif
                                </select>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Description</label>
                                <textarea name="description" class="form-control" required>
                                {{old('description')}}
                                </textarea>
                                @if($errors->has('image'))
                                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Image</label>
                                <input type="file" class="form-control" name="image" placeholder="Image" value="" required>
                                @if($errors->has('image'))
                                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                        </div>
                        <br>
                        <!-- Button -->
                        <button class="btn btn-block btn-primary" type="submit">Submit form</button>
                    </form>

                </div>
            </div>
        </div>
    </div> <!-- / .row -->
</div>
@endsection
