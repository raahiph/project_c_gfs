@php
use App\Models\Role;
$loggedInUser=Auth::user();
$role=Role::find($loggedInUser->role_id);


@endphp
<nav class="navbar navbar-vertical fixed-left navbar-expand-md " id="sidebar">
    <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="./index.html">
            <img src="{{ asset('assets/img/logo.svg') }}" class="navbar-brand-img
      mx-auto" alt="...">
        </a>

        <!-- User (xs) -->
        <div class="navbar-user d-md-none">

            <!-- Dropdown -->
            <div class="dropdown">

                <!-- Logo -->
                <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="{{ asset('assets/img/avatars/profiles/avatar-1.jpg') }}" class="avatar-img rounded-circle" alt="...">
                    </div>
                </a>

                <!-- Menu -->

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="{{route('users.show',$loggedInUser->id)}}" class="dropdown-item">Profile</a>
                    <a href="./settings.html" class="dropdown-item">Settings</a>
                    <hr class="dropdown-divider">
                    <a href="./sign-in.html" class="dropdown-item">Logout</a>
                </div>

            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fe fe-search"></span>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <!-- Divider -->
                <hr class="navbar-divider my-3">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('home')) ? 'active' : '' }}">
                        <i class="fe fe-home"></i> Dashboard
                    </a>
                </li>
                <!-- Divider -->
                <hr class="navbar-divider my-3">

                <li class="nav-item">
                    <a href="{{ url('customers') }}" class="nav-link {{ (request()->is('customers')) ? 'active' : '' }}">
                        <i class="fe fe-users"></i> Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('suppliers') }}" class="nav-link {{ (request()->is('suppliers')) ? 'active' : '' }}">
                        <i class="fe fe-users"></i> Suppliers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('unit_types') }}" class="nav-link {{ (request()->is('unit_types')) ? 'active' : '' }}">
                        <i class="fe fe-box"></i> Unit Types
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('categories') }}" class="nav-link {{ request()->is('categories') ? 'active' : '' }}">
                        <i class="fe fe-layers"></i> Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('products') }}" class="nav-link {{ request()->is('products') ? 'active' : '' }}">
                        <i class="fe fe-package"></i> Products
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sales.index') }}" class="nav-link {{ request()->is('sales') ? 'active' : '' }}">
                        <i class="fe fe-align-justify"></i> Sales
                    </a>
                </li>
                @if($role->name=="admin")
                <li class="nav-item">
                    <a href="{{ url('users') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                        <i class="fe fe-package"></i> Users
                    </a>
                </li>
                @endif

        <!-- Push content down -->
        {{-- <div class="mt-auto"></div> --}}


        <!-- Customize -->
        {{-- <div id="popoverDemo" data-toggle="popover" data-trigger="manual" title="Make Dashkit Your Own!"
                data-content="Switch the demo to Dark Mode or adjust the navigation layout, icons, and colors!">
                <a href="#modalDemo" class="btn btn-block btn-primary mb-4" data-toggle="modal">
                    <i class="fe fe-sliders mr-2"></i> Customize
                </a>

            </div>--}}



        <!-- User (md) -->
        <div class="navbar-user d-none d-md-flex" id="sidebarUser">

            <!-- Icon -->
            {{-- <a href="#sidebarModalActivity" class="navbar-user-link" data-toggle="modal">
                    <span class="icon">
                        <i class="fe fe-bell"></i> Logout
                    </span>
                </a> --}}

            <!-- Dropup -->
            {{-- <div class="dropup">

                <!-- Toggle -->
                <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="{{ asset('assets/img/avatars/profiles/avatar-1.jpg') }}" class="avatar-img rounded-circle" alt="...">
                    </div>
                    <br>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                    <a href="{{route('users.show',auth()->user()->id)}}" class="dropdown-item">Profile</a>

                    <hr class="dropdown-divider">

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

            </div> --}}

            <!-- Icon -->
        </div>


    </div> <!-- / .navbar-collapse -->

    </div>
</nav>
