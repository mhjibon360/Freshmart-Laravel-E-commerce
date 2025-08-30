@extends('frontend.layouts.frontend-master')
@section('title', 'my cart')
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
                            <li class="breadcrumb-item"><a href="#!">Home</a></li>
                            <li class="breadcrumb-item"><a href="#!">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->
    <section class="mb-lg-14 mb-8 mt-8">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <!-- card -->
                    <div class="card py-1 border-0 mb-8">
                        <div>
                            <h1 class="fw-bold">Shop Cart</h1>
                            <p class="mb-0">Shopping in 382480</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <!-- cart page left items -->
                @include('frontend.layouts.partials.cart.cart-left-items')

                <!-- cart page right cart data calculation -->
                @include('frontend.layouts.partials.cart.cart-right-calculation')
            </div>
        </div>
    </section>
@endsection
