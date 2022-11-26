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
                                {{ trans('cruds.sales.title_singular') }}
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
                    <form class="mb-4" action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="mobile">Products</label>
                                <select class="form-control" name="product_id" require>
                                    <option disabled selected>--Select Option--</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="mobile">Customers</label>
                                <select class="form-control" name="customer_id" require>
                                    <option disabled selected>--Select Option--</option>
                                    @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Location</label>
                                <input type="text" class="form-control" name="location" placeholder="location" value="{{old('location')}}" required>
                                @if($errors->has('location'))
                                <div class="alert alert-danger">{{ $errors->first('location') }}</div>
                                @endif
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Payment Method</label>
                                <input type="text" class="form-control" name="payment_method" placeholder="Payment Method" value="{{old('payment_method')}}" required>
                                @if($errors->has('payment_method'))
                                <div class="alert alert-danger">{{ $errors->first('payment_method') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Quantity</label>
                                <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="{{old('quantity')}}" required>
                                @if($errors->has('quantity'))
                                <div class="alert alert-danger">{{ $errors->first('quantity') }}</div>
                                @endif
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Total Amount</label>
                                <input type="number" class="form-control" name="total_amount" placeholder="Total Amount" value="{{old('total_amount')}}" required>
                                @if($errors->has('total_amount'))
                                <div class="alert alert-danger">{{ $errors->first('total_amount') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Total Paid</label>
                                <input type="number" class="form-control" name="total_paid" placeholder="Total Paid" value="{{old('total_paid')}}" required>
                                @if($errors->has('total_paid'))
                                <div class="alert alert-danger">{{ $errors->first('total_paid') }}</div>
                                @endif
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Total Dues</label>
                                <input type="number" class="form-control" name="total_dues" placeholder="Total Dues" value="{{old('total_dues')}}" required>
                                @if($errors->has('total_dues'))
                                <div class="alert alert-danger">{{ $errors->first('total_dues') }}</div>
                                @endif
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Shipping Details</label>
                                <textarea class="form-control" name="shipping_details" required>
                                {{old('shipping_details')}}
                                </textarea>
                                @if($errors->has('shipping_details'))
                                <div class="alert alert-danger">{{ $errors->first('shipping_details') }}</div>
                                @endif
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label for="address">Notes</label>
                                <textarea class="form-control" name="notes" required>
                                {{old('notes')}}
                                </textarea>
                                @if($errors->has('notes'))
                                <div class="alert alert-danger">{{ $errors->first('notes') }}</div>
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
