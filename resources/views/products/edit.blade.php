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
                                Edit Existing
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
               


                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf

                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" >
                                @if ($errors->has('name'))
                                <span class="alert alert-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="email">Code</label>
                                <input type="text" class="form-control" name="code" value="{{$product->code}}" >
                                @if($errors->has('code'))
                                <div class="alert alert-danger">{{ $errors->first('code') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="mobile">Unit Type</label>
                                <select class="form-control" name="unit_type_id">
                                    <option disabled>--Select Option--</option>
                                    @foreach($unitType as $type)
                                    @if($product->unit_type_id==$type->id)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                    @else
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endif

                                    @endforeach
                                    @if($errors->has('unit_type_id'))
                                    <div class="alert alert-danger">{{ $errors->first('unit_type_id') }}</div>
                                    @endif
                                </select>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Unit</label>
                                <input type="text" class="form-control" name="units" placeholder="unit" value="{{$product->units}}" >
                                @if($errors->has('units'))
                                <div class="alert alert-danger">{{ $errors->first('units') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="gender">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Price" value="{{$product->price}}" >
                                @if($errors->has('price'))
                                <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                                @endif
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label for="mobile">Category</label>
                                <select class="form-control" name="category_id">
                                    <option disabled>--Select Option--</option>
                                    @foreach($category as $cat)
                                    @if($product->category_id==$cat->id)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @else
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endif
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
                                    <option disabled>--Select Option--</option>
                                    @foreach($supplier as $sup)
                                    @if($product->supplier_id==$sup->id)
                                    <option value="{{$sup->id}}">{{$sup->name}}</option>
                                    @else
                                    <option value="{{$sup->id}}">{{$sup->name}}</option>
                                    @endif

                                    @endforeach
                                    @if($errors->has('supplier_id'))
                                    <div class="alert alert-danger">{{ $errors->first('supplier_id') }}</div>
                                    @endif
                                </select>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Description</label>
                                <textarea name="description" class="form-control">
                                {{$product->description}}
                                </textarea>
                                @if($errors->has('description'))
                                <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Image</label>
                                <input type="file" class="form-control" name="image" placeholder="Image" value="">
                               
                            </div>
                            <div class="col-12 col-md-6 mb-3">

                                <img src="{{ asset('images/'.$product->image) }}" alt="product image" title="product image" height="100px" width="100px">

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