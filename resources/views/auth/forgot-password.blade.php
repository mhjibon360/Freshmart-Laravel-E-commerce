<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Codescandy" name="author" />
    <title>Forget Password eCommerce - FreshCart</title>
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon/favicon.ico') }}" />

    <!-- Libs CSS -->
    <link href="{{ asset('frontend/assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/libs/feather-webfont/dist/feather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.min.css') }}" />


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
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                        <!-- img -->
                        <img src="{{ asset('frontend') }}/assets/images/svg-graphics/fp-g.svg" alt=""
                            class="img-fluid" />
                    </div>
                    <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1 d-flex align-items-center">
                        <div>
                            <div class="mb-lg-9 mb-5">
                                <!-- heading -->
                                <h1 class="mb-2 h2 fw-bold">Forgot your password?</h1>
                                <p>Please enter the email address associated with your account and We will email you a
                                    link to reset your password.</p>
                            </div>

                            @if (Session::has('status'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>{{ Session::get('status') }}</strong>
                                </div>
                            @endif

                            <!-- form -->
                            <form class="needs-validation" novalidate method="POST"
                                action="{{ route('password.email') }}">
                                @csrf
                                @method('post')
                                <!-- row -->
                                <div class="row g-3">
                                    <!-- col -->
                                    <div class="col-12">
                                        <!-- input -->
                                        <label for="formForgetEmail" class="form-label visually-hidden">Email
                                            address</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" id="formForgetEmail" placeholder="Email" required />
                                        @error('email')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- btn -->
                                    <div class="col-12 d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Reset Password</button>
                                        <a href="{{ route('login') }}" class="btn btn-light">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
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
    <script src="{{ asset('frontend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('frontend/assets/js/theme.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/vendors/validation.js') }}"></script>
</body>


</html>
