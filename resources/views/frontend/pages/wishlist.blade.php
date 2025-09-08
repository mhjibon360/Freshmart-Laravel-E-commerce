@extends('frontend.layouts.frontend-master')
@section('title', 'wishlist')
@section('main')
    <!-- section-->
    <div class="mt-4">
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <!-- breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Wishlist</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->
    <section class="mt-8 mb-14">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-8">
                        <!-- heading -->
                        <h1 class="mb-1">My Wishlist</h1>
                        <p>There are
                            <span class="wishlistpage_product_count" id="wishlistpage_product_count">0</span>
                            products in this wishlist.
                        </p>
                    </div>
                    <div>
                        <!-- table -->
                        <div class="table-responsive">
                            <table class="table text-nowrap table-with-checkbox">
                                <thead class="table-light">
                                    <tr>
                                        <th>Image</th>
                                        <th></th>
                                        <th>Product</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="wishitpage_product_holder" id="wishitpage_product_holder">
                                    {{-- <tr>
                                        <td class="align-middle">
                                        </td>
                                        <td class="align-middle">
                                            <a href="#"><img
                                                    src="{{ asset('frontend') }}/assets/images/products/product-img-18.jpg"
                                                    class="icon-shape icon-xxl" alt="" /></a>
                                        </td>
                                        <td class="align-middle">
                                            <div>
                                                <h5 class="fs-6 mb-0"><a href="#" class="text-inherit">Organic
                                                        Banana</a></h5>
                                                <small>$.98 / lb</small>
                                            </div>
                                        </td>
                                        <td class="align-middle">$35.00</td>
                                        <td class="align-middle"><span class="badge bg-success">In Stock</span></td>
                                        <td class="align-middle">
                                            <div class="btn btn-primary btn-sm">Add to Cart</div>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#" class="text-muted" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete">
                                                <i class="feather-icon icon-trash-2"></i>
                                            </a>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
