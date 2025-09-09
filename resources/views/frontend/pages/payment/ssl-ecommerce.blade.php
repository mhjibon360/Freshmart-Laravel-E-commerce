@extends('frontend.layouts.frontend-master')
@section('title', 'ssl payment')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="shadow p-4 my-5">
                    <div class=" p-3">
                        <h5><i class="bi bi-card-list"></i> SSL PAYMENT</h5>
                    </div>
                    <hr class="mt-0 mb-1">
                    <div class="">
                        @session('success')
                            <div class="alert alert-success" role="alert">
                                {{ $value }}
                            </div>
                        @endsession
                        <form  method='post' action="{{ route('sslc.pay') }}">
                            @csrf
                            @method('POST')

                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                            <input type="hidden" name="upazila_id" value="{{ $data['upazila_id'] }}">
                            <input type="hidden" name="union_id" value="{{ $data['union_id'] }}">
                            <input type="hidden" name="name" value="{{ $data['name'] }}">
                            <input type="hidden" name="email" value="{{ $data['email'] }}">
                            <input type="hidden" name="phone" value="{{ $data['phone'] }}">
                            <input type="hidden" name="address" value="{{ $data['address'] }}">
                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                            <input type="hidden" name="notes" value="{{ $data['notes'] }}">


                            <button type="submit" class="btn btn-primary">Pay with SSLCommerz</button>
                            <form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('frontend-script')
    <style type="text/css">
        #card-element {
            height: 50px;
            padding-top: 16px;
        }
    </style>
@endpush
