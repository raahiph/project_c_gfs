@extends('layouts.master')

@section('content')
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
                                {{ trans('cruds.products.title') }}
                            </h1>

                        </div>
                        <div class="col-auto">

                            <a class="btn btn-primary" href="{{ route('products.create') }}">
                                Add {{ trans('cruds.products.title_singular') }}
                            </a>

                        </div>
                    </div> <!-- / .row -->
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Nav -->
                            <ul class="nav nav-tabs nav-overflow header-tabs">
                                <li class="nav-item">
                                    <a href="#!" class="nav-link active">
                                        All <span class="badge badge-pill badge-soft-secondary">{{ $total_products }}</span>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="#!" class="nav-link">
                                        Requested <span class="badge badge-pill badge-soft-secondary">24</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#!" class="nav-link">
                                        Processing <span class="badge badge-pill badge-soft-secondary">3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#!" class="nav-link">
                                        Delivered <span class="badge badge-pill badge-soft-secondary">71</span>
                                    </a>
                                </li> --}}
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

                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table">
                        <thead>
                            <tr>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-order">
                                        Display
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-order">
                                        Name
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-product">
                                        Code
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-date">
                                        Unit Type
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-total">
                                        Units
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-status">
                                        Price
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-status">
                                        Current Stock
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-status">
                                        Availability
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-status">
                                        Category
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-status">
                                        Supplier
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-status">
                                        Description
                                    </a>
                                </th>

                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-status">
                                        Status
                                    </a>
                                </th>
                                <th colspan="2">
                                    <a href="#" class="text-muted sort" data-sort="orders-method">
                                        Action
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($products as $product)
                            <tr>
                                <td class="orders-order">
                                    <img src="{{ asset('images/'.$product->image) }}" alt="Product" title="Product" height="100px" width="100px">
                                </td>
                                <td class="orders-order">
                                    {{ $product->name }}
                                </td>
                                <td class="orders-product">
                                    {{ $product->code }}
                                </td>
                                <td class="orders-date">
                                    {{ $product->unit_type->name ?? 'Null' }}
                                </td>
                                <td class="orders-total">
                                    {{ $product->units }}
                                </td>
                                <td class="orders-status">
                                    {{ $product->price }}
                                </td>
                                <td class="orders-status">
                                    {{ $product->current_stock }}
                                </td>
                                <td class="orders-status">
                                    <div class="badge badge-soft-{{ $product->availability ? "success" : "danger" }}">
                                        {{ $product->availability ? "In Stock" : "Out Of Stock" }}
                                    </div>
                                </td>
                                <td class="orders-method">
                                    {{ $product->category->name }}
                                </td>
                                <td class="orders-method">
                                    {{ $product->supplier->name }}
                                </td>
                                <td class="orders-method">
                                    {{ $product->description }}
                                </td>

                                <td class="orders-method">
                                    <!-- Badge -->
                                    <div class="badge badge-soft-{{ $product->status ? "success" : "danger" }}">
                                        {{ $product->status ? "Active" : "Inactive" }}
                                    </div>
                                </td>
                                <td class="text-right">
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('products.show', $product->id) }}" class="dropdown-item">
                                                Show
                                            </a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="dropdown-item">
                                                Edit
                                            </a>

                                            {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) !!}
                                            {!! Form::button('<i>Delete</i>', ['type' => 'submit','class'=>'dropdown-item']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            {{-- <tr>
                                <td>

                                    <!-- Checkbox -->
                                    <div class="custom-control custom-checkbox table-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="ordersSelect"
                                            id="ordersSelectOne">
                                        <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                                    </div>

                                </td>
                                <td class="orders-order">
                                    #6522
                                </td>
                                <td class="orders-product">
                                    Flexfit Hat
                                </td>
                                <td class="orders-date">

                                    <!-- Time -->
                                    <time datetime="2018-07-28">07/28/18</time>

                                </td>
                                <td class="orders-total">
                                    $25.50
                                </td>
                                <td class="orders-sratus">

                                    <!-- Badge -->
                                    <div class="badge badge-soft-warning">
                                        Processing
                                    </div>

                                </td>
                                <td class="orders-method">
                                    Visa
                                </td>
                                <td class="text-right">

                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <!-- Checkbox -->
                                    <div class="custom-control custom-checkbox table-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="ordersSelect"
                                            id="ordersSelectOne">
                                        <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                                    </div>

                                </td>
                                <td class="orders-order">
                                    #6523
                                </td>
                                <td class="orders-product">
                                    Reversible Hoodie
                                </td>
                                <td class="orders-date">

                                    <!-- Time -->
                                    <time datetime="2018-07-27">07/27/18</time>

                                </td>
                                <td class="orders-total">
                                    $64.99
                                </td>
                                <td class="orders-status">

                                    <!-- Badge -->
                                    <div class="badge badge-soft-danger">
                                        Cancelled
                                    </div>

                                </td>
                                <td class="orders-method">
                                    Amex
                                </td>
                                <td class="text-right">

                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#!" class="dropdown-item">
                                                Action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Another action
                                            </a>
                                            <a href="#!" class="dropdown-item">
                                                Something else here
                                            </a>
                                        </div>
                                    </div>

                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div> <!-- / .row -->

</div>
@endsection
