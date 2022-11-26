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
                                    Note ID #{{ $sale->id }}
                                </h6>

                                <!-- Title -->
                                <h1 class="header-title">
                                    Delivery Note
                                </h1>

                            </div>
                            <div class="col-auto">

                                <!-- Buttons -->
                                {{-- <a href="#!" class="btn btn-white lift">
                                Download
                            </a> --}}
                                <a href="#!" class="btn btn-primary ml-2 lift" onclick="printDiv('printableArea')">
                                    <i class="fe fe-printer"></i> Print
                                </a>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>

                <!-- Content -->
                <div class="card card-body p-5 print-element" id="printableArea">
                    <div class="row">
                        <div class="col text-right">

                            <!-- Badge -->
                            <div class="badge badge-success">
                                {{ $sale->status }}
                            </div>

                        </div>
                    </div> <!-- / .row -->
                    <div class="row">
                        <div class="col text-center">

                            <!-- Logo -->
                            <img src="{{ asset('assets/img/logo.svg') }}" alt="..." class="img-fluid mb-4"
                                style="max-width: 10rem;">

                            <!-- Title -->
                            <h2 class="mb-2">
                                Delivery Note
                            </h2>

                            <!-- Text -->
                            <p class="text-muted mb-6">
                                Note ID #{{ $sale->id }}
                            </p>

                        </div>
                    </div> <!-- / .row -->
                    <div class="row">
                        <div class="col-12 col-md-6">

                            <!-- Heading -->
                            <h6 class="text-uppercase text-muted">
                                Note ID
                            </h6>

                            <!-- Text -->
                            <p class="mb-4">
                                #{{ $sale->id }}
                            </p>

                            <!-- Heading -->
                            <h6 class="text-uppercase text-muted">
                                Note for
                            </h6>

                            <!-- Text -->
                            <p class="text-muted mb-4">
                                <strong class="text-body">{{ $sale->customer_name }}</strong> <br>
                                {{ $sale->customer_mobile }} <br>
                                {{ $sale->customer_address }} <br>
                            </p>



                        </div>
                        <div class="col-12 col-md-6 text-md-right">



                            <!-- Heading -->
                            <h6 class="text-uppercase text-muted">
                                Printed at
                            </h6>

                            <!-- Text -->
                            <p class="mb-4">
                                <time datetime="2018-04-23">{{ now() }}</time>
                            </p>

                            <!-- Heading -->
                            <h6 class="text-uppercase text-muted">
                                Printed by
                            </h6>

                            <!-- Text -->
                            <p class="text-muted mb-4">
                                <strong class="text-body">{{ auth()->user()->name }}</strong> <br>
                                <br>
                                <br>
                            </p>

                        </div>
                    </div> <!-- / .row -->
                    <div class="row">
                        <div class="col-12">

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table my-4">
                                    <thead>
                                        <tr>
                                            <th class="px-0 bg-transparent border-top-0">
                                                <span class="h6">Title</span>
                                            </th>
                                            <th class="px-0 bg-transparent border-top-0">
                                                <span class="h6">Price</span>
                                            </th>
                                            <th class="px-0 bg-transparent border-top-0">
                                                <span class="h6">Quantity</span>
                                            </th>
                                            <th class="px-0 bg-transparent border-top-0 text-right">
                                                <span class="h6">Amount</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-0">
                                                {{ $sale->product_name }}
                                            </td>
                                            <td class="px-0">
                                                {{ $sale->total_amount / $sale->quantity }}
                                            </td>
                                            <td class="px-0">
                                                {{ $sale->quantity }}
                                            </td>
                                            <td class="px-0 text-right">
                                                {{ $sale->total_amount }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-0 border-top border-top-2">
                                                <strong>Total amount paid</strong>
                                            </td>
                                            <td colspan="3" class="px-0 text-right border-top border-top-2">
                                                <span class="h3">
                                                    {{ $sale->total_paid }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <hr class="my-5">

                            <!-- Title -->
                            <h6 class="text-uppercase">
                                Notes
                            </h6>

                            <!-- Text -->
                            <p class="text-muted mb-0">
                                {{ $sale->notes }}
                            </p>

                        </div>
                    </div> <!-- / .row -->
                </div>

            </div>
        </div> <!-- / .row -->
    </div>
@endsection

@push('scripts')
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
