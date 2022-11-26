<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="./assets/fonts/feather/feather.css" />
    <link rel="stylesheet" href="./assets/libs/flatpickr/dist/flatpickr.min.css" />
    <link rel="stylesheet" href="./assets/libs/quill/dist/quill.core.css" />
    <link rel="stylesheet" href="./assets/libs/highlightjs/styles/vs2015.css" />

    <!-- Map -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" rel="stylesheet" />

    <!-- Theme CSS -->

    <link rel="stylesheet" href="./assets/css/theme.min.css" id="stylesheetLight">
    <link rel="stylesheet" href="./assets/css/theme-dark.min.css" id="stylesheetDark">

    <style>
        body {
            display: none;
        }

    </style>

    <!-- Title -->
    <title>Dashkit</title>

</head>

<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

    <!-- CONTENT
    ================================================== -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-xl-4 my-5">

                <div class="text-center" >

                    <img src="{{ asset('assets/img/logo.svg') }}" alt="" height="200" width="200">
                </div>
                {{-- <!-- Heading -->
                <h1 class="display-4 text-center mb-3">
                    Sign in
                </h1>

                <!-- Subheading -->
                <p class="text-muted text-center mb-5">
                    Dashboard Access
                </p> --}}

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email address -->
                    <div class="form-group">

                        <!-- Label -->
                        <label>Email Address</label>

                        <!-- Input -->
                        <input type="email" id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="name@address.com">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <!-- Password -->
                    <div class="form-group">

                        <div class="row">
                            <div class="col">

                                <!-- Label -->
                                <label>Password</label>

                            </div>
                            <div class="col-auto">

                                <!-- Help text -->
                                {{-- <a href="password-reset.html" class="form-text small text-muted">
                    Forgot password?
                  </a> --}}

                            </div>
                        </div> <!-- / .row -->

                        <!-- Input group -->
                        <div class="input-group input-group-merge">

                            <!-- Input -->
                            <input type="password" id="password"
                                class="form-control form-control-appended @error('password') is-invalid @enderror"
                                placeholder="Enter your password" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <!-- Icon -->
                            {{-- <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fe fe-eye"></i>
                                </span>
                            </div> --}}

                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-lg btn-block btn-primary mb-3">
                        {{ __('Login') }}
                    </button>


                    <!-- Link -->
                    {{-- <div class="text-center">
                        <small class="text-muted text-center">
                            Don't have an account yet? <a href="sign-up.html">Sign up</a>.
                        </small>
                    </div> --}}

                </form>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/libs/@shopify/draggable/lib/es5/draggable.bundle.legacy.js"></script>
    <script src="./assets/libs/autosize/dist/autosize.min.js"></script>
    <script src="./assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="./assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="./assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="./assets/libs/highlightjs/highlight.pack.min.js"></script>
    <script src="./assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="./assets/libs/list.js/dist/list.min.js"></script>
    <script src="./assets/libs/quill/dist/quill.min.js"></script>
    <script src="./assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="./assets/libs/chart.js/Chart.extension.js"></script>

    <!-- Map -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.min.js"></script>


</body>

</html>
