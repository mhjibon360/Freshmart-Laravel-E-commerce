<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Codescandy" name="author" />
    <title> FreshCart- @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/segment.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.css"
        integrity="sha512-JEUoTOcC35/ovhE1389S9NxeGcVLIqOAEzlpcJujvyUaxvIXJN9VxPX0x1TwSo22jCxz2fHQPS1de8NgUyg+nA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @routes
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/assets/js/segment.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.js"
        integrity="sha512-09bUVOnphTvb854qSgkpY/UGKLW9w7ISXGrN0FR/QdXTkjs0D+EfMFMTB+CGiIYvBoFXexYwGUD5FD8xVU89mw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        $(".segment-select").Segment();

        $(function() {
            $("#product-rating").rateYo({
                rating: 0, // default rating
                fullStar: true, // only full stars
                starWidth: "25px",
                ratedFill: "#F39C12", // color of filled stars
                normalFill: "#ddd", // color of empty stars
                onSet: function(rating, rateYoInstance) {
                    $("#rating-value").val(rating); // set hidden input value
                }
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#add_image', function(e) {
                e.preventDefault();
                $('#image_box').toggle();
            });
        });
    </script>
    @stack('frontend-script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        // ===initail sweet alert message
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
        })
        // ===initail sweet alert message end

        // ***************************************** quick view product modal******************************
        function productView(id) {
            $.ajax({
                type: "GET",
                url: route('quick.view'),
                data: {
                    id: id
                },
                dataType: "html",
                beforeSend: function() {
                    $('#quickViewBody').html(
                        `<div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>`
                    );
                },
                success: function(response) {
                    $('#quickViewBody').html(response);
                    $('#quickViewModal').modal('show');
                }
            });
        }
        // ***************************************** cart all function******************************

        function addToCart(id) {
            var color = $('#color').val();
            var size = $('#size').val();
            var quantity = $('#quantity').val();
            $.ajax({
                type: "POST",
                url: route('add.to.cart'),
                data: {
                    id: id,
                    color: color,
                    size: size,
                    quantity: quantity,
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Toast.fire({
                            icon: 'success',
                            title: response.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Sorry, something is wrong.',
                        })
                    }
                }
            });
        }

        // ***************************************** compare all function******************************
        function addToCompare(id) {
            $.ajax({
                type: "POST",
                url: route('add.to.compare'),
                data: {
                    id: id,
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Toast.fire({
                            icon: 'success',
                            title: response.success,
                        })
                    } else if (response.warning) {
                        Toast.fire({
                            icon: 'warning',
                            title: response.warning,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: response.error,
                        })
                    }
                }
            });
        }
        // ***************************************** wishlist all function******************************
        function addTowishlist(id) {
            $.ajax({
                type: "POST",
                url: route('add.to.wishlist'),
                data: {
                    id: id,
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Toast.fire({
                            icon: 'success',
                            title: response.success,
                        })
                    } else if (response.warning) {
                        Toast.fire({
                            icon: 'warning',
                            title: response.warning,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: response.error,
                        })
                    }
                }
            });
        }
    </script>


</body>

</html>
