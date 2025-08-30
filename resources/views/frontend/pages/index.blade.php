@extends('frontend.layouts.frontend-master')
@section('title', 'home')
@section('main')
    <!--banner/home-slider-->
    @include('frontend.layouts.partials.home.banner')

    <!-- Category Section Start-->
    @include('frontend.layouts.partials.home.featured-category')

    <!-- Advertisement-->
    @include('frontend.layouts.partials.home.ads')

    <!-- Popular Products Start-->
    @include('frontend.layouts.partials.home.popular-product')

    <!--best sells-->
    @include('frontend.layouts.partials.home.best-sells')

    <!--services item-->
    @include('frontend.layouts.partials.home.services')
@endsection
