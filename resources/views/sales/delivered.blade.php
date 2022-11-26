@extends('layouts.master')

@section('content')
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
                                        <a href="{{ route('approved') }}" class="nav-link">
                                            Approved <span class="badge badge-pill badge-soft-secondary">{{$totalApprovedSales}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('delivered') }}" class="nav-link active">
                                            Delivered <span class="badge badge-pill badge-soft-secondary">{{$totalDeliveredSales}}</span>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

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
                                    <th>
                                        <a href="#" class="text-muted sort" data-sort="orders-status">
                                            Print
                                        </a>
                                    </th>

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
                                    <td class="orders-method">
                                        <a href="{{URL::to('/generate/receipt/pdf/'.$sale->id)}}" class="btn btn-primary btn-sm text-white">View</a>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Form -->
                <form>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Customer Name</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
