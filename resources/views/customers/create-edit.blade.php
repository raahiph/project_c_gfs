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
                                {{ trans('cruds.customers.title_singular') }}
                            </h1>

                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>

            <!-- Card -->
          <div class="card">
            <div class="card-body">

              <!-- Form -->
              <form class="mb-4"
                action="{{ isset($customers) ? route('customers.update',$customers->id) : route('customers.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf

                @if (isset($customers))
                @method('PATCH')
                @endif

                <div class="form-row">
                  <div class="col-12 col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                     value="{{ isset($customers) ? $customers->name : ''}}" required>
                  </div>
                  <div class="col-12 col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                    value="{{ isset($customers) ? $customers->email : ''}}" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-12 col-md-6 mb-3">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile"
                    value="{{ isset($customers) ? $customers->mobile : ''}}" required>
                  </div>
                  <div class="col-12 col-md-6 mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                    value="{{ isset($customers) ? $customers->address : ''}}" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-12 col-md-6 mb-3">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" maxlength="1" size="1" placeholder="M for male, F for Female" value="{{ isset($customers) ? $customers->gender : ''}}" required>
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
