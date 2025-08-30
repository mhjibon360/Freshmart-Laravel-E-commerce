<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Codescandy" name="author" />
    <title> FreshCart- @yield('title')</title>

    <link href="{{ asset('frontend/assets/libs/slick-carousel/slick/slick.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/libs/slick-carousel/slick/slick-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon/favicon.ico') }}" />

    <!-- Libs CSS -->
    <link href="{{ asset('frontend/assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/libs/feather-webfont/dist/feather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.min.css') }}" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-M8S4MT3EYG");
    </script>
    <script type="text/javascript">
        (function(c, l, a, r, i, t, y) {
            c[a] =
                c[a] ||
                function() {
                    (c[a].q = c[a].q || []).push(arguments);
                };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "kuc8w5o9nt");
    </script>
</head>

<body>
    <!-- navbar -->
    @include('frontend.layouts.inc.header')

    <!--sign up modal-->
    @include('frontend.layouts.partials.sign-up-modal')

    <!-- Shop Cart -->
    @include('frontend.layouts.partials.shopping-cart-modal')

    <!-- Location Modal -->
    @include('frontend.layouts.partials.location-modal')

    <script src="{{ asset('frontend/assets/js/vendors/validation.js') }}"></script>

    <main>
        @yield('main')
    </main>

    <!-- Quick product modal view -->
    @include('frontend.layouts.partials.quick-product-modal')
    <!-- footer -->
    @include('frontend.layouts.inc.footer')


    <!-- Libs JS -->
    <!-- <script src="./{{ asset('frontend/assets/libs/jquery/dist/jquery.min.js') }}"></script> -->
    <script src="{{ asset('frontend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('frontend/assets/js/theme.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/countdown.js') }}"></script>
    <script src="{{ asset('frontend/assets/libs/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/slick-slider.js') }}"></script>
    <script src="{{ asset('frontend/assets/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/tns-slider.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendors/zoom.js') }}"></script>
</body>
</html>
