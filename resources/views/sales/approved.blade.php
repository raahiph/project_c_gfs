@extends('layouts.master')

@section('content')
@php
use App\Models\Role;
$loggedInUser=Auth::user();
$role=Role::find($loggedInUser->role_id);

@endphp
<div class="main-content">

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <!-- Header -->
                <div class="header mt-md-5">
                    <div class="header-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Pretitle -->
                                <h6 class="header-pretitle">
                                    total
                                </h6>

                                <!-- Title -->
                                <h1 class="header-title">
                                    {{ trans('cruds.sales.title') }}
                                </h1>

                            </div>
                            <div class="col-auto">

                                <!-- Button trigger modal -->
                                {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Add {{ trans('cruds.sales.title_singular') }}
                                </button> --}}

                                <a class="btn btn-primary" href="{{ route('sales.create') }}">
                                    Add {{ trans('cruds.sales.title_singular') }}
                                </a>

                            </div>
                        </div> <!-- / .row -->
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Nav -->
                                <ul class="nav nav-tabs nav-overflow header-tabs">
                                    <li class="nav-item">
                                        <a href="{{ route('sales.index') }}" class="nav-link ">
                                            All <span class="badge badge-pill badge-soft-secondary">{{ $totalSales }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('requested') }}" class="nav-link">
                                            Requested <span class="badge badge-pill badge-soft-secondary">{{$totalRequestedSales}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('approved') }}" class="nav-link active">
                                            Approved <span class="badge badge-pill badge-soft-secondary">{{$totalApprovedSales}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('delivered') }}" class="nav-link ">
                                            Delivered <span class="badge badge-pill badge-soft-secondary">{{$totalDeliveredSales}}</span>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                <!-- Card -->
                <div class="card" data-toggle="lists" data-options='{"valueNames": ["orders-order", "orders-product", "orders-date", "orders-total", "orders-status", "orders-method"]}'>
                    <div class="card-header">

                        <!-- Search -->
                        <form>
                            <div class="input-group input-group-flush">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fe fe-search"></i>
                                    </span>
                                </div>
                                <input class="form-control search" type="search" placeholder="Search">
                            </div>
                        </form>

                        <!-- Dropdown -->
                        {{-- <div class="dropdown">
                            <button class="btn btn-sm btn-white dropdown-toggle" type="button" id="bulkActionDropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Bulk action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bulkActionDropdown">
                                <a class="dropdown-item" href="#!">Action</a>
                                <a class="dropdown-item" href="#!">Another action</a>
                                <a class="dropdown-item" href="#!">Something else here</a>
                            </div>
                        </div> --}}

                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-nowrap card-table">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="#" class="text-muted sort" data-sort="orders-product">
                                            Product
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" class="text-muted sort" data-sort="orders-date">
                                            Customer
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" class="text-muted sort" data-sort="orders-date">
                                            User
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" class="text-muted sort" data-sort="orders-total">
                                            Payment Status
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" class="text-muted sort" data-sort="orders-status">
                                            Payment Method
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" class="text-muted sort" data-sort="orders-status">
                                            QTY
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" class="text-muted sort" data-sort="orders-status">
                                            Amount
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" class="text-muted sort" data-sort="orders-status">
                                            Paid
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" class="text-muted sort" data-sort="orders-status">
                                            Dues
                                        </a>
                                    <th>
                                        <a href="#" class="text-muted sort" data-sort="orders-status">
                                            Status
                                        </a>
                                    <th>
                                        <a href="#" class="text-muted sort" data-sort="orders-status">
                                            Shipping Details
                                        </a>
                                    </th>
                                    @if($role->name=="staff")
                                    <th colspan="2">
                                        <a href="#" class="text-muted sort" data-sort="orders-method">
                                            upload image
                                        </a>
                                    </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="list">



                                @foreach ($sales as $sale)
                                <tr>
                                    <td class="orders-order">
                                        {{ $sale->product->name }}
                                    </td>
                                    <td class="orders-product">
                                        {{ $sale->customer->name }}
                                    </td>
                                    <td class="orders-product">
                                        {{ $sale->user->name }}
                                    </td>
                                    <td class="orders-date">
                                        {{ ($sale->payment_status ? 'Paid':'Not Paid') }}

                                    </td>
                                    <td class="orders-total">
                                        {{ $sale->payment_method }}
                                    </td>
                                    <td class="orders-status">
                                        {{ $sale->quantity }}


                                    </td>
                                    <td class="orders-method">
                                        {{ $sale->total_amount }}
                                    </td>
                                    <td class="orders-method">
                                        {{ $sale->total_paid }}
                                    </td>
                                    <td class="orders-method">
                                        {{ $sale->total_dues }}
                                    </td>
                                    <td class="orders-method">
                                        @if ($sale->status == "Requested")
                                        <div class="badge badge-soft-warning">
                                            {{ $sale->status }}
                                        </div>
                                        @elseif ($sale->status == "Approved")
                                        <div class="badge badge-soft-info">
                                            {{ $sale->status }}
                                        </div>
                                        @elseif ($sale->status == "Delivered")
                                        <div class="badge badge-soft-success">
                                            {{ $sale->status }}
                                        </div>
                                        @elseif ($sale->status == "Cancelled")
                                        <div class="badge badge-soft-danger">
                                            {{ $sale->status }}
                                        </div>
                                        @endif
                                    </td>
                                    <td class="orders-method">
                                        {{ $sale->shipping_details }}
                                    </td>
                                    <td class="text-right">

                                        <!-- Dropdown -->
                                        @if($role->name=="staff")
                                        <form action="{{ route('sales.delivered',$sale->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="file" name="delivery_image" placeholder="image">
                                            <button type="submit" class="btn btn-primary btn-sm text-white">Submit</button>
                                        </form>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div> <!-- / .row -->

    </div>

</div>
@endsection
