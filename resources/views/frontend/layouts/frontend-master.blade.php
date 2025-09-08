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
            timer: 2200,
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
        // mini cart
        function miniCart() {
            $.ajax({
                type: "GET",
                url: route('get.minicart.product'),
                dataType: "json",
                success: function(response) {
                    var row = '';
                    $.each(response.carts, function(key, value) {
                        row +=
                            `
                    <li class="list-group-item py-3 ps-0">
                      <div class="row align-items-center">
                          <div class="col-6 col-md-6 col-lg-7">
                              <div class="d-flex">
                                  <img src="${value.options.image}"
                                      alt="Ecommerce" class="icon-shape icon-xxl" />
                                  <div class="ms-3">
                                      <a href="product/details/${value.id}/${value.options.slug}" class="text-inherit">
                                          <h6 class="mb-0">${value.name}</h6>
                                      </a>
                                      <span><small class="text-muted">${value.options.size}</small></span>
                                      <span><small class="text-muted">${value.options.color}</small></span>
                                      <!-- text -->
                                      <div class="mt-2 small lh-1">
                                          <a type="button" id="${value.rowId}" onclick=removeCartItem(this.id) class="text-decoration-none text-inherit">
                                              <span class="me-1 align-text-bottom">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                      viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                      class="feather feather-trash-2 text-success">
                                                      <polyline points="3 6 5 6 21 6"></polyline>
                                                      <path
                                                          d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                      </path>
                                                      <line x1="10" y1="11" x2="10" y2="17">
                                                      </line>
                                                      <line x1="14" y1="11" x2="14" y2="17">
                                                      </line>
                                                  </svg>
                                              </span>
                                              <span class="text-muted" >Remove</span>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <!-- input group -->
                          <div class="col-4 col-md-3 col-lg-3">
                              <!-- input -->
                              <!-- input -->
                              <div class="input-group input-spinner">
                                ${value.qty>1?
                                `<input type="button" value="-" class="button-minus btn btn-sm"
                                                                                              data-field="quantity" id="${value.rowId}" onclick="decrementCartItem(this.id)" />`:
                                `<input type="button" disabled value="-" class="button-minus btn btn-sm disabled"
                                                                                              data-field="quantity" id="${value.rowId}" onclick="decrementCartItem(this.id)" />`}
                                  <input type="number" step="1" max="10" value="${value.qty}" name="quantity"
                                      class="quantity-field form-control-sm form-input"  />
                                  <input type="button" value="+" class="button-plus btn btn-sm"
                                      data-field="quantity" id="${value.rowId}" onclick="incrementCartItem(this.id)" />
                              </div>
                          </div>
                          <!-- price -->
                          <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                            <div class=" text-muted ">$${value.subtotal}</div>
                              <span class="fw-bold text-success small">${value.qty} * $${value.price}</span>
                          </div>
                      </div>
                    </li>
                        `;
                    });
                    $('#minicart_holder').html(row);
                    $('.minicart_counter').html(response.cartcount);
                }
            });
        }
        miniCart(); //calling mini cart

        //  cart
        function Cart() {
            $.ajax({
                type: "GET",
                url: route('get.cart.product'),
                dataType: "json",
                success: function(response) {
                    var row = '';
                    $.each(response.carts, function(key, value) {
                        row +=
                            `
                    <hr>
                    <li class="list-group-item py-3 ps-0">
                      <div class="row align-items-center">
                          <div class="col-6 col-md-6 col-lg-7">
                              <div class="d-flex">
                                  <img src="${value.options.image}"
                                      alt="Ecommerce" class="icon-shape icon-xxl" />
                                  <div class="ms-3">
                                      <a href="product/details/${value.id}/${value.options.slug}" class="text-inherit">
                                          <h6 class="mb-0">${value.name}</h6>
                                      </a>
                                      <span><small class="text-muted">${value.options.size}</small></span>
                                      <span><small class="text-muted">${value.options.color}</small></span>
                                      <!-- text -->
                                      <div class="mt-2 small lh-1">
                                          <a type="button" id="${value.rowId}" onclick=removeCartItem(this.id) class="text-decoration-none text-inherit">
                                              <span class="me-1 align-text-bottom">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                      viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                      class="feather feather-trash-2 text-success">
                                                      <polyline points="3 6 5 6 21 6"></polyline>
                                                      <path
                                                          d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                      </path>
                                                      <line x1="10" y1="11" x2="10" y2="17">
                                                      </line>
                                                      <line x1="14" y1="11" x2="14" y2="17">
                                                      </line>
                                                  </svg>
                                              </span>
                                              <span class="text-muted" >Remove</span>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <!-- input group -->
                          <div class="col-4 col-md-3 col-lg-3">
                              <!-- input -->
                              <!-- input -->
                              <div class="input-group input-spinner">
                                ${value.qty>1?
                                `<input type="button" value="-" class="button-minus btn btn-sm"
                                                                                              data-field="quantity" id="${value.rowId}" onclick="decrementCartItem(this.id)" />`:
                                `<input type="button" disabled value="-" class="button-minus btn btn-sm disabled"
                                                                                              data-field="quantity" id="${value.rowId}" onclick="decrementCartItem(this.id)" />`}
                                  <input type="number" step="1" max="10" value="${value.qty}" name="quantity"
                                      class="quantity-field form-control-sm form-input"  />
                                  <input type="button" value="+" class="button-plus btn btn-sm"
                                      data-field="quantity" id="${value.rowId}" onclick="incrementCartItem(this.id)" />
                              </div>
                          </div>
                          <!-- price -->
                          <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                            <div class=" text-muted ">$${value.subtotal}</div>
                              <span class="fw-bold text-success small">${value.qty} * $${value.price}</span>
                          </div>
                      </div>
                    </li>
                    <hr>
                        `;
                    });
                    $('#cart_page_product_holder').html(row);
                    $('.shop_page_cart_counter').html(response.cartcount);
                }
            });
        }
        Cart(); //calling mini cart

        // add to cart
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
                    Cart(); //calling cart
                    miniCart(); //calling mini cart
                    couponcalclation();
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

        // remove to cart
        function removeCartItem(rowId) {
            $.ajax({
                type: "POST",
                url: route('cart.product.remove'),
                data: {
                    rowId: rowId,
                },
                dataType: "json",
                success: function(response) {
                    Cart(); //calling cart
                    miniCart(); //calling mini cart
                    couponcalclation();
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

        // increment to cart
        function incrementCartItem(rowId) {
            $.ajax({
                type: "POST",
                url: route('cart.product.increment'),
                data: {
                    rowId: rowId,
                },
                dataType: "json",
                success: function(response) {
                    Cart(); //calling cart
                    miniCart(); //calling mini cart
                    couponcalclation();
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

        // decrement to cart
        function decrementCartItem(rowId) {
            $.ajax({
                type: "POST",
                url: route('cart.product.decrement'),
                data: {
                    rowId: rowId,
                },
                dataType: "json",
                success: function(response) {
                    miniCart(); //calling mini cart
                    Cart(); //calling cart
                    couponcalclation();
                    if (response.success) {
                        Toast.fire({
                            icon: 'warning',
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

        // clear  cart
        function clearCart() {
            $.ajax({
                type: "POST",
                url: route('cart.clear'),
                dataType: "json",
                success: function(response) {
                    Cart(); //calling cart
                    miniCart(); //calling mini cart
                    couponcalclation();
                    if (response.success) {
                        Toast.fire({
                            icon: 'warning',
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

        // top hader show wishlist counter
        function topheaderwishlitcounter() {
            $.ajax({
                type: "GET",
                url: route("top.wishlist.counter"),
                // data: "data",
                dataType: "json",
                success: function(response) {
                    $('#top_wishit_counter').text(response);
                }
            });
        }
        topheaderwishlitcounter(); //calling

        // show wishlist page product
        function getWishlist() {
            $.ajax({
                type: "GET",
                url: route("wishlist.products"),
                // data: "data",
                dataType: "json",
                success: function(response) {
                    var row = '';
                    $.each(response.wishlists, function(key, value) {
                        row +=
                            `
                        <tr>
                            <td class="align-middle"></td>

                            <td class="align-middle">
                                <a href="#"><img
                                        src="${value.product.thumbnail}"
                                        class="icon-shape icon-xxl" alt="" /></a>
                            </td>
                            <td class="align-middle">
                                <div>
                                    <h5 class="fs-6 mb-0"><a href="#" class="text-inherit">${value.product.product_name}</a></h5>
                                    <small>${value.product.type}</small>
                                </div>
                            </td>
                            <td class="align-middle">
                                ${value.product.discount_price?
                                `$${value.product.discount_price} $${value.product.price} `:
                                `$${value.product.price}`
                                }
                                </td>
                            <td class="align-middle">
                                ${value.product.quantity>0 ?
                                `
                                                                                                                                                <span class="badge bg-success">In Stock</span>
                                                                                                                                                `:
                                `
                                                                                                                                                 <span class="badge bg-danger">Out of Stock</span>
                                                                                                                                                `}

                            </td>
                            <td class="align-middle">
                                <div class="btn btn-primary btn-sm" id="${value.product.id}"
                                    onclick="addToCart(this.id)" >Add to Cart</div>
                            </td>
                            <td class="align-middle">
                                <a type="button" id="${value.id}" onclick="removeTowishlist(this.id)" class="text-muted" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Delete">
                                    <i class="feather-icon icon-trash-2"></i>
                                </a>
                            </td>
                            </tr>
                        `;
                    });
                    $('#wishitpage_product_holder').html(row);
                    $('#wishlistpage_product_count').text(response.wishlistcount);
                }
            });
        }
        getWishlist(); //calling

        // add to wishlit
        function addTowishlist(id) {
            $.ajax({
                type: "POST",
                url: route('add.to.wishlist'),
                data: {
                    id: id,
                },
                dataType: "json",
                success: function(response) {
                    topheaderwishlitcounter(); //calling
                    getWishlist(); //calling
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
        // remove to wishlit
        function removeTowishlist(id) {
            $.ajax({
                type: "POST",
                url: route('remove.product.wishlist'),
                data: {
                    id: id,
                },
                dataType: "json",
                success: function(response) {
                    getWishlist(); //calling
                    topheaderwishlitcounter(); //calling
                    if (response) {
                        Toast.fire({
                            icon: 'success',
                            title: response,
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
        // ***************************************** coupon all function******************************
        function couponApply() {
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: "POST",
                url: route('coupon.apply'),
                data: {
                    coupon_name: coupon_name,
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        couponcalclation();
                        $('.session_apply_area').hide();
                        Toast.fire({
                            icon: 'success',
                            title: response.success,
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

        // coupon calculation
        function couponcalclation() {
            $.ajax({
                type: "GET",
                url: route('coupon.calculation'),
                // data: "data",
                dataType: "json",
                success: function(response) {
                    if (response.yes_coupon === true) {
                        $('.cart_calculation').html(`
                         <h2 class="h5 mb-4">Summary</h2>
                        <div class="card mb-2">
                            <!-- list group -->
                            <ul class="list-group list-group-flush">
                                <!-- list group item -->
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="me-auto">
                                        <div>Coupon Name</div>
                                    </div>
                                    <span class="badge bg-light-primary text-dark-primary">${response.coupon_name}</span>
                                    <span class="ml-2 ms-2 badge bg-light-danger text-dark-danger cursor-pointer" onclick="removeCoupon()" style="cursor:pointer;"><i class="bi bi-trash"></i></span>
                                </li>

                                <!-- list group item -->
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="me-auto">
                                        <div>Coupon Discount</div>
                                    </div>
                                    <span class="badge bg-light-warning text-dark-warning">${response.coupon_discount}%</span>
                                </li>
                                <!-- list group item -->
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="me-auto">
                                        <div class="fw-bold">Discount Amount</div>
                                    </div>
                                    <span class="fw-bold">$${response.discount_amount}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="me-auto">
                                        <div class="fw-bold">Total Amount</div>
                                    </div>
                                    <span class="fw-bold">$${response.total_amount}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="d-grid mb-1 mt-4">
                            <!-- btn -->
                            <button class="btn btn-primary btn-lg d-flex justify-content-between align-items-center"
                                type="submit">
                                Go to Checkout
                                <span class="fw-bold">$${response.total_amount}</span>
                            </button>
                        </div>
                        `);
                    } else {
                        $('.cart_calculation').html(`
                         <h2 class="h5 mb-4">Summary</h2>
                        <div class="card mb-2">
                            <!-- list group -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="me-auto">
                                        <div class="fw-bold">Total Amount</div>
                                    </div>
                                    <span class="fw-bold">$${response.total_amount}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="d-grid mb-1 mt-4">
                            <!-- btn -->
                            <button class="btn btn-primary btn-lg d-flex justify-content-between align-items-center"
                                type="submit">
                                Go to Checkout
                                <span class="fw-bold">$${response.total_amount}</span>
                            </button>
                        </div>
                        `);
                    }
                }
            });
        }
        couponcalclation();

        // remove coupon
        function removeCoupon() {
            $.ajax({
                type: "POST",
                url: route('coupon.remove'),
                // data: "data",
                // dataType: "dataType",
                success: function(response) {
                    if (response) {
                        couponcalclation();
                        $('.session_apply_area').show();
                        Toast.fire({
                            icon: 'success',
                            title: response,
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
