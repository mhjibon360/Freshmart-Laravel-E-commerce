@extends('frontend.layouts.frontend-master')
@section('title', 'shop page')
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
                            <li class="breadcrumb-item active"><a href="javascript::void();">Shop</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->
    <div class="mt-8 mb-lg-14 mb-8">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row gx-10">
                <!--left filter item col -->
                @include('frontend.layouts.partials.shop.shop-page-left-filter')

                <!--right product col -->
               @include('frontend.layouts.partials.shop.shop-page-right-product')
            </div>
        </div>
    </div>
@endsection
