<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TCHAO TCHAO</title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <link rel="icon" href="../assets/images/brand-logos/favicon.ico" type="image/x-icon">

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('admin/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ asset('admin/assets/css/styles.min.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="my-5 d-flex justify-content-center">
                <a href="{{ route('home') }}">
                        <img src="{{ asset('admin/assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
                    </a>
                </div>
                <div class="card custom-card">
                    <div class="card-body p-5">
                        <p class="h5 fw-semibold mb-2 text-center">Registration</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome & Join us by creating a free account!</p>

                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Signup Form -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-xl-6">
                                    <label for="signup-firstname" class="form-label text-default">First Name</label>
                                    <input type="text" class="form-control form-control-lg" name="first_name" id="signup-firstname" placeholder="First Name" required>
                                </div>
                                <div class="col-xl-6">
                                    <label for="signup-lastname" class="form-label text-default">Last Name</label>
                                    <input type="text" class="form-control form-control-lg" name="last_name" id="signup-lastname" placeholder="Last Name" required>
                                </div>
                                <div class="col-xl-6">
                                    <label for="signup-phone" class="form-label text-default">Phone Number</label>
                                    <input type="tel" class="form-control form-control-lg" name="phone" id="signup-phone" placeholder="Phone Number" required>
                                </div>
                                <div class="col-xl-6">
                                    <label for="email" class="form-label text-default">Email</label>
                                    <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="Email" required>
                                </div>
                                <div class="col-xl-6">
                                    <label for="signup-password" class="form-label text-default">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" name="password" id="signup-password" placeholder="Password" required>
                                        <button class="btn btn-light" onclick="createpassword('signup-password', this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="col-xl-6 mb-2">
                                    <label for="signup-confirmpassword" class="form-label text-default">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" name="password_confirmation" id="signup-confirmpassword" placeholder="Confirm Password" required>
                                        <button class="btn btn-light" onclick="createpassword('signup-confirmpassword', this)" type="button" id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Create Account</button>
                                </div>
                            </div>
                        </form>

                        <div class="text-center">
                            <p class="fs-12 text-muted mt-3">Already have an account? <a href="{{ route('showlogin') }}" class="text-primary">Sign In</a></p>
                        </div>
                        <div class="text-center my-3 authentication-barrier">
                            <span>OR</span>
                        </div>
                        <div class="btn-list text-center">
                            <button class="btn btn-icon btn-light">
                                <i class="ri-facebook-line fw-bold text-dark op-7"></i>
                            </button>
                            <button class="btn btn-icon btn-light">
                                <i class="ri-google-line fw-bold text-dark op-7"></i>
                            </button>
                            <button class="btn btn-icon btn-light">
                                <i class="ri-twitter-line fw-bold text-dark op-7"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Show Password JS -->
    <script src="{{ asset('admin/assets/js/show-password.js') }}"></script>
</body>
</html>
