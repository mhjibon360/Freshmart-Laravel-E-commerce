<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">
    <title> FreshCart | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #nprogress .bar {
            background: linear-gradient(180deg, #7ce67c, #CEEFCE) !important;
            height: 10px;
            z-index: 9999999 !important;
        }
    </style>
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/images/favicon/favicon.ico') }}">


    <!-- Libs CSS -->
    <link href="{{ asset('backend/assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/libs/feather-webfont/dist/feather-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/theme.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.2/css/bootstrap5-toggle.min.css" rel="stylesheet" />
    @stack('admin_style')
    @routes
</head>

<body>
    <!-- main -->
    <div>
        <!--top navbar -->
        @include('backend.layouts.includes.top-nav')


        <div class="main-wrapper">
            <!-- navbar vertical -->
            <!-- navbar -->
            @include('backend.layouts.includes.side-nav')

            <nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1"
                id="offcanvasExample">
                <div class="navbar-vertical">
                    <div class="px-4 py-5 d-flex justify-content-between align-items-center">
                        <a href="../index.html" class="navbar-brand">
                            <img src="{{ asset('backend') }}/assets/images/logo/freshcart-logo.svg" alt="" />
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link  active " href="index.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-house"></i></span>
                                        <span>Dashboard</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item mt-6 mb-3">
                                <span class="nav-label">Store Managements</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="products.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                                        <span class="nav-link-text">Products</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="categories.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
                                        <span class="nav-link-text">Categories</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                                    data-bs-target="#navOrders" aria-expanded="false" aria-controls="navOrders">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-bag"></i></span>
                                        <span class="nav-link-text">Orders</span>
                                    </div>
                                </a>
                                <div id="navOrders" class="collapse " data-bs-parent="#sideNavbar">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link " href="order-list.html">List</a>
                                        </li>
                                        <!-- Nav item -->
                                        <li class="nav-item">
                                            <a class="nav-link " href="order-single.html">Single</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="vendor-grid.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-shop"></i></span>
                                        <span class="nav-link-text">Sellers / Vendors</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="customers.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-people"></i></span>
                                        <span class="nav-link-text">Customers</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="reviews.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-star"></i></span>
                                        <span class="nav-link-text">Reviews</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item mt-6 mb-3">
                                <span class="nav-label">Site Settings</span>
                                <span class="badge bg-light-info text-dark-info">Coming Soon</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#!">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-newspaper"></i></span>
                                        <span class="nav-link-text">Blog</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-images"></i></span>
                                        <span class="nav-link-text">Media</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#!">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-gear"></i></span>
                                        <span class="nav-link-text">Store Settings</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item mt-6 mb-3">
                                <span class="nav-label">Support</span>
                                <span class="badge bg-light-info text-dark-info">Coming Soon</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#!">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-headphones"></i></span>
                                        <span class="nav-link-text">Support Ticket</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-question-circle"></i></span>
                                        <span class="nav-link-text">Help Center</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#!">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-infinity"></i></span>
                                        <span class="nav-link-text">How FreshCart Works</span>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item mt-6 mb-3">
                                <span class="nav-label">Our Apps</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#!">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-apple"></i></span>
                                        <span class="nav-link-text">Apple Store</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#!">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><i class="bi bi-google-play"></i></span>
                                        <span class="nav-link-text">Google Play Store</span>
                                    </div>
                                </a>
                            </li>
                            <li id="navMenuLevel" class="collapse " data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link " href="#" data-bs-toggle="collapse"
                                            data-bs-target="#navMenuLevelSecond2" aria-expanded="false"
                                            aria-controls="navMenuLevelSecond2">
                                            Two Level
                                        </a>
                                        <div id="navMenuLevelSecond2" class="collapse"
                                            data-bs-parent="#navMenuLevel">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#">NavItem 1</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#">NavItem 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                                            data-bs-target="#navMenuLevelThree2" aria-expanded="false"
                                            aria-controls="navMenuLevelThree2">
                                            Three Level
                                        </a>
                                        <div id="navMenuLevelThree2" class="collapse "
                                            data-bs-parent="#navMenuLevel">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link  collapsed " href="#"
                                                        data-bs-toggle="collapse" data-bs-target="#navMenuLevelThree3"
                                                        aria-expanded="false" aria-controls="navMenuLevelThree3">
                                                        NavItem 1
                                                    </a>
                                                    <div id="navMenuLevelThree3" class="collapse collapse "
                                                        data-bs-parent="#navMenuLevelThree">
                                                        <ul class="nav flex-column">
                                                            <li class="nav-item">
                                                                <a class="nav-link " href="#">NavChild Item
                                                                    1</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#">Nav Item 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- main wrapper -->
            <main class="main-content-wrapper">
                <section class="container">
                    @yield('content')
                </section>
            </main>
        </div>
    </div>

    <!-- Libs JS -->
    {{-- <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('backend/assets/js/theme.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.2/js/bootstrap5-toggle.ecmas.min.js"></script>

    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>
    <script>
        // Page load complete হলে NProgress finish
        $(window).on('load', function() {
            NProgress.done();
        });

        // Page refresh / back / forward / link click start
        $(document).on('click', 'a[href]', function(e) {
            const href = $(this).attr('href');

            // Skip blank target, anchors, same page
            if ($(this).attr('target') === '_blank' || href.startsWith('#') || href === window.location.href) {
                return;
            }

            // Start NProgress
            NProgress.start();

            // Optional: minimum progress time
            setTimeout(() => NProgress.done(), 1000); // 1s minimum bar
        });

        // Page refresh/back/forward
        $(window).on('beforeunload', function() {
            NProgress.start();
        });

        // Optional: page initially loading
        NProgress.start();
    </script>
    @stack('admin_script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>

</html>
