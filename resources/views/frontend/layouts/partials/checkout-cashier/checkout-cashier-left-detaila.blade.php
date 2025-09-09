<div class="col-xl-7 col-lg-6 col-md-12">
    <form action="{{ route('payment.store') }}" method="post">
        @csrf
        {{-- @method('POST') --}}


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


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="">
                            <img src="https://image.opencart.com/cache/5822b7a44e951-resize-710x380.jpg"
                                class=" img-fluid img-thumbnail" style="height: 120px;object-fit:cover;width:100%;"
                                alt="">
                            <div class="card-footer">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="stripe"
                                        value="stripe"  />
                                    <label class="form-check-label" for="stripe"> Card(Visa/Master) </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQczuZLAKO49cMJ5jjsDOzdMg6nzXNnP6f11LceGeeha1pE31oJrOYqVgDmWa9Hoa4NW-A&usqp=CAU"
                                class=" img-fluid img-thumbnail" style="height: 120px;object-fit:cover;width:100%;"
                                alt="">
                            <div class="card-footer">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="paypal"
                                        value="paypal"  />
                                    <label class="form-check-label" for="paypal"> Paypal </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="">
                            <img src="https://www.observerbd.com/2022/01/01/observerbd.com_1640968788.jpg"
                                class=" img-fluid img-thumbnail" style="height: 120px;object-fit:cover;width:100%;"
                                alt="">
                            <div class="card-footer">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method"
                                        id="mobile_banking" value="mobile_banking"  />
                                    <label class="form-check-label" for="mobile_banking"> Mobile </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="">
                            <img src="https://www.shutterstock.com/image-vector/cash-on-delivery-logo-cod-260nw-2192932617.jpg"
                                class=" img-fluid img-thumbnail" style="height: 120px;object-fit:cover;width:100%;"
                                alt="">
                            <div class="card-footer">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="cod"
                                        value="cod" />
                                    <label class="form-check-label" for="cod"> Cod</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class=" btn btn-primary rounded-1" type="submit">Pay Now</button>
            </div>
        </div>

    </form>
</div>
