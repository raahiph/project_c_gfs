@extends('layouts.master')

@section('content')

    <!-- HEADER -->
    <div class="header">
        <div class="container-fluid">

            <!-- Body -->
            <div class="header-body">
                <div class="row align-items-end">
                    <div class="col">

                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                            Overview
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Dashboard
                        </h1>

                    </div>
                    {{-- <div class="col-auto">

                        <!-- Button -->
                        <a href="#!" class="btn btn-primary lift">
                            Create Report
                        </a>

                    </div> --}}
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div> <!-- / .header -->

    <!-- CARDS -->
    <div class="container-fluid">
        <div class="row">

            {{-- Sales --}}
            <div class="col-12 col-lg-6 col-xl">

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Sales
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    {{isset($totalSales) ? $totalSales : 0}}
                                </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-align-justify text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>

            </div>
            {{-- Requested --}}
            <div class="col-12 col-lg-6 col-xl">

                <!-- Time -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Requested
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    {{isset($totalPendingOrders)? $totalPendingOrders : 0 }}
                                </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-clock text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>

            </div>
            {{-- Approved --}}
            <div class="col-12 col-lg-6 col-xl">

                <!-- Time -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Approved
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    {{isset($totalApprovedOrders) ? $totalApprovedOrders : 0}}
                                </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-star text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>

            </div>
            {{-- Delivered --}}
            <div class="col-12 col-lg-6 col-xl">

                <!-- Time -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Delivered
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    {{isset($totalDeliveredOrders) ? $totalDeliveredOrders : 0}}
                                </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-check-circle text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>

            </div>

        </div> <!-- / .row -->
        <div class="row">
            {{-- Customers --}}
            <div class="col-12 col-lg-6 col-xl">

                <!-- Value  -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Customers
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    {{ $total_customers }}
                                </span>

                                <!-- Badge -->
                                {{-- <span class="badge badge-soft-success mt-n1">
                                        +3.5%
                                    </span> --}}
                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-users text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>

            </div>
            {{-- Suppliers --}}
            <div class="col-12 col-lg-6 col-xl">

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Suppliers
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    {{ $total_suppliers }}
                                </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-users text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>

            </div>
            {{-- Products --}}
            <div class="col-12 col-lg-6 col-xl">

                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Products
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    {{ $total_products }}
                                </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-package text-muted mb-0"></span>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>

            </div>
        </div> <!-- / .row -->

        {{-- Charts --}}
        <div class="row">
            <div class="col-12 col-xl-8">

                <!-- Convertions -->
                <div class="card">
                    <div class="card-header">

                        <!-- Title -->
                        <h4 class="card-header-title">
                            {{  'Deliveries in '.Carbon\Carbon::now()->format('M, Y') }}
                        </h4>

                        <!-- Caption -->
                        <!-- <span class="text-muted mr-3">
                                Last year comparision:
                            </span> -->

                        <!-- Switch -->
                        {{-- <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="cardToggle" data-toggle="chart"
                                data-target="#conversionsChart" data-trigger="change" data-action="add"
                                data-dataset="1" />
                            <label class="custom-control-label" for="cardToggle"></label>
                        </div> --}}

                    </div>
                    <div class="card-body">

                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="conversionsChart" class="chart-canvas"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">

                <!-- Traffic -->
                <div class="card">
                    <div class="card-header">

                        <!-- Title -->
                        <h4 class="card-header-title">
                            {{-- {{ Carbon\Carbon::now()->month }} --}}
                            {{  Carbon\Carbon::now()->format('M, Y') }}
                        </h4>

                        <!-- Tabs -->
                        <ul class="nav nav-tabs nav-tabs-sm card-header-tabs">
                            <li class="nav-item" data-toggle="chart" data-target="#trafficChart" data-trigger="click"
                                data-action="toggle" data-dataset="0">
                                <a href="#" class="nav-link active" data-toggle="tab">
                                    All
                                </a>
                            </li>
                            <li class="nav-item" data-toggle="chart" data-target="#trafficChart" data-trigger="click"
                                data-action="toggle" data-dataset="1">
                                <a href="#" class="nav-link" data-toggle="tab">
                                    Direct
                                </a>
                            </li>
                        </ul>

                    </div>
                    <div class="card-body">

                        <!-- Chart -->
                        <div class="chart chart-appended">
                            <canvas id="trafficChart" class="chart-canvas" data-toggle="legend"
                                data-target="#trafficChartLegend"></canvas>
                        </div>

                        <!-- Legend -->
                        <div id="trafficChartLegend" class="chart-legend"></div>

                    </div>
                </div>
            </div>
        </div> <!-- / .row -->
    </div>
@endsection

@push('scripts')
<script>
    var pieChartData = [@json($pieChartData)];
    var barChartData = [@json($barChartData)];

    console.log(barChartData[0]);

    let bar_chart_dates = []
    let bar_chart_counts = []
    for (let i = 0; i < barChartData[0].length; i++) {
        console.log(barChartData[0][i].days);
        bar_chart_dates.push(barChartData[0][i].days)
        bar_chart_counts.push(barChartData[0][i].count)
    }
    
</script>

@endpush
