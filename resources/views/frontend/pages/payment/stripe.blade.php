@extends('frontend.layouts.frontend-master')
@section('title', 'stripe payment')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="shadow p-4 my-5">
                    <div class=" p-3">
                        <h5><i class="bi bi-card-list"></i> Card</h5>
                    </div>
                    <hr class="mt-0 mb-1">
                    <div class="">
                        @session('success')
                            <div class="alert alert-success" role="alert">
                                {{ $value }}
                            </div>
                        @endsession
                        <form id='checkout-form' method='post' action="{{ route('stripe.post') }}">
                            @csrf

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


                            <strong>Name:</strong>
                            <input type="input" class="form-control" name="name" placeholder="Enter Name">
                            <input type='hidden' name='stripeToken' id='stripe-token-id'>
                            <br>
                            <div id="card-element" class="form-control"></div>
                            <button id='pay-btn' class="btn btn-primary rounded-0 mt-3" type="button"
                                style="margin-top: 20px; width: 100%;padding: 7px;" onclick="createToken()">PAY
                                ${{ round($amount) }}
                            </button>
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
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        var stripe = Stripe('{{ env('STRIPE_KEY') }}')
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        function createToken() {
            document.getElementById("pay-btn").disabled = true;
            stripe.createToken(cardElement).then(function(result) {

                if (typeof result.error != 'undefined') {
                    document.getElementById("pay-btn").disabled = false;
                    alert(result.error.message);
                }

                /* creating token success */
                if (typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    document.getElementById('checkout-form').submit();
                }
            });
        }
    </script>
@endpush
