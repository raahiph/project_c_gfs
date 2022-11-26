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
                                {{ trans('cruds.users.title') }}
                            </h1>

                        </div>
                        <div class="col-auto">

                            <a class="btn btn-primary" href="{{ route('users.create') }}">
                                Add {{ trans('cruds.users.title_singular') }}
                            </a>

                        </div>
                    </div> <!-- / .row -->
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Nav -->
                            <ul class="nav nav-tabs nav-overflow header-tabs">
                                <li class="nav-item">
                                    <a href="#!" class="nav-link active">
                                        All <span
                                            class="badge badge-pill badge-soft-secondary">{{ $total_users }}</span>
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

            {{-- Session Message --}}
            @if(session()->has('message'))
            <p class="alert {{ session()->get('alert-class') }}">{{ session()->get('message') }}</p>
            @endif

            <!-- Card -->
            <div class="card" data-toggle="lists"
                data-options='{"valueNames": ["orders-order", "orders-product", "orders-date", "orders-total", "orders-statu    s", "orders-method"]}'>
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
                                    <a href="#" class="text-muted sort" data-sort="orders-order">
                                        ID
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-product">
                                        Name
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-product">
                                        Email
                                    </a>
                                </th>
                                <th>
                                    <a href="#" class="text-muted sort" data-sort="orders-product">
                                        Role
                                    </a>
                                </th>
                                <th class="text-right">
                                    <a href="#" class="text-muted sort" data-sort="orders-method">
                                        Actions
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($users as $user)
                            <tr>
                                <td class="orders-order">
                                    {{ $user->id }}
                                </td>
                                <td class="orders-product">
                                    {{ $user->name }}
                                </td>
                                <td class="orders-product">
                                    {{ $user->email }}
                                </td>
                                <td class="orders-product">
                                    {{ $user->role->name }}
                                </td>
                                <td class="text-right">
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ url('users/'.$user->id.'/edit') }}"
                                                class="dropdown-item">
                                                Edit
                                            </a>
                                            <form action="{{ url('users/'.$user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"> Delete
                                                </button>
                                            </form>
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
