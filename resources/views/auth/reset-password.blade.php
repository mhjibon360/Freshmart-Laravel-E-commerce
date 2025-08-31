<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Codescandy" name="author" />
    <title>freshcart-reset password</title>
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend') }}/assets/images/favicon/favicon.ico" />
    <!-- Libs CSS -->
    <link href="{{ asset('frontend/assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/libs/feather-webfont/dist/feather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.min.css') }}" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
</head>

<body>
    <!-- navigation -->
    <div class="border-bottom shadow-sm">
        <nav class="navbar navbar-light py-2">
            <div class="container justify-content-center justify-content-lg-between">
                <a class="navbar-brand" href="{{ route('home.index') }}">
                    <img src="{{ asset('frontend') }}/assets/images/logo/freshcart-logo.svg" alt=""
                        class="d-inline-block align-text-top" />
                </a>
                <span class="navbar-text">
                    Already have an account?
                    <a href="{{ route('login') }}">Sign in</a>
                </span>
            </div>
        </nav>
    </div>

    <main>
        <!-- section -->
        <section class="my-lg-14 my-8">
            <div class="container">
                <!-- row -->
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                        <!-- img -->
                        <img src="{{ asset('frontend') }}/assets/images/svg-graphics/signin-g.svg" alt=""
                            class="img-fluid" />
                    </div>
                    <!-- col -->
                    <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                        <div class="mb-lg-9 mb-5">
                            <h1 class="mb-1 h2 fw-bold">Reset your Password</h1>
                            <p>Welcome back to FreshCart! Enter your email to get started.</p>
                        </div>

                        <form class="needs-validation" novalidate method="POST" action="{{ route('password.store') }}">
                            @csrf
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="row g-3">
                                <!-- row -->
                                <div class="col-12">
                                    <!-- input -->
                                    <label for="formSigninEmail" class="form-label visually-hidden">Email
                                        address</label>
                                    <input type="email" name="email" value="{{ old('email', $request->email) }}"
                                        class="form-control" id="formSigninEmail" placeholder="Email" required />
                                    <div class="invalid-feedback">Please enter name.</div>
                                </div>

                                <div class="col-12">
                                    <!-- input -->
                                    <div class="password-field position-relative">
                                        <label for="formSigninPassword"
                                            class="form-label visually-hidden">Password</label>
                                        <div class="password-field position-relative">
                                            <input type="password" name="password" class="form-control fakePassword"
                                                id="formSigninPassword" placeholder="password" required />
                                            <span><i class="bi bi-eye-slash passwordToggler"></i></span>
                                            <div class="invalid-feedback">Please enter password.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <!-- input -->
                                    <div class="password-field position-relative">
                                        <label for="password_confirmation" class="form-label visually-hidden">Confirm
                                            Password</label>
                                        <div class="password-field position-relative">
                                            <input type="password" name="password_confirmation"
                                                class="form-control fakePassword" id="password_confirmation"
                                                placeholder="confirm password" required />
                                            <span><i class="bi bi-eye-slash passwordToggler"></i></span>
                                            <div class="invalid-feedback">Please enter password.</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- btn -->
                                <div class="col-12 d-grid"><button type="submit" class="btn btn-primary">Reset
                                        Password</button></div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <!-- footer -->
    @include('frontend.layouts.inc.footer')
    <!-- Javascript-->
    <!-- Libs JS -->
    <!-- <script src="{{ asset('frontend') }}/assets/libs/jquery/dist/jquery.min.js"></script> -->
    <script src="{{ asset('frontend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('frontend/assets/js/theme.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/vendors/password.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/validation.js') }}"></script>
</body>


</html>
