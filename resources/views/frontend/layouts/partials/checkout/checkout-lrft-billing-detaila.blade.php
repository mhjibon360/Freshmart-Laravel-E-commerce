<div class="col-xl-7 col-lg-6 col-md-12">
    <form action="{{ route('payment.cashier') }}" method="post">
        @csrf
        @method('post')
        <div class="card ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="name" class="form-label text-capitalize">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ Auth::user()->name }}" />
                            @error('name')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="email" class="form-label text-capitalize"> email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ Auth::user()->email }}" />
                            @error('email')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="phone" class="form-label text-capitalize">Mobile/ phone</label>
                            <input type="phone" name="phone" id="phone" class="form-control"
                                value="{{ Auth::user()->phone }}" />
                            @error('phone')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="address" class="form-label text-capitalize">Full address</label>
                            <input type="address" name="address" id="address" class="form-control"
                                value="{{ Auth::user()->address }}" />
                            @error('address')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="post_code" class="form-label text-capitalize"> post code</label>
                            <input type="post_code" name="post_code" id="post_code" class="form-control"
                                value="{{ old('post_code') }}" />
                            @error('post_code')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="notes" class="form-label text-capitalize"> notes</label>
                            <textarea class="form-control" name="notes" id="notes" rows="4">{{ old('notes') }}</textarea>
                            @error('notes')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="division_id" class="form-label text-capitalize"> Division</label>
                            <select name="division_id" id="division_id"
                                class="js-example-basic-single form-control division_id">
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">
                                        {{ $division->name }}({{ $division->bn_name }})</option>
                                @endforeach
                            </select>
                            @error('division_id')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="district_id" class="form-label text-capitalize"> distirct</label>
                            <select name="district_id" id="district_id"
                                class="district_id js-example-basic-single form-control">
                                {{-- @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila->id }}">
                                        {{ $upazila->name }}({{ $upazila->bn_name }})</option>
                                @endforeach --}}
                            </select>
                            @error('district_id')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="upazila_id" class="form-label text-capitalize"> upazila</label>
                            <select name="upazila_id" id="upazila_id"
                                class="upazila_id js-example-basic-single form-control">
                                {{-- @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila->name }}">
                                        {{ $upazila->name }}({{ $upazila->bn_name }})</option>
                                @endforeach --}}
                            </select>
                            @error('upazila_id')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="union_id" class="form-label text-capitalize"> union</label>
                            <select name="union_id" id="union_id"
                                class="union_id js-example-basic-single form-control">
                                {{-- @foreach ($unions as $union)
                                    <option value="{{ $union->name }}">
                                        {{ $union->name }}({{ $union->bn_name }})</option>
                                @endforeach --}}
                            </select>
                            @error('union_id')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class=" btn btn-primary rounded-1 text-capitalize" type="submit">processed to pay</button>
            </div>
        </div>
    </form>
</div>
@push('frontend-script')
    <script>
        $(document).ready(function() {
            // get district
            $(document).on('change', '#division_id', function(e) {
                var division_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: route('get.district'),
                    data: {
                        division_id: division_id,
                    },
                    dataType: "json",
                    success: function(response) {
                        var html = '<option selected disabled>--select district--</option>';
                        $.each(response, function(key, value) {
                            html +=
                                `<option value="${value.id}">${value.name}(${value.bn_name})</option>`;
                        });
                        $('#district_id').html(html);
                    }
                });
            });

            // get upzial
            $(document).on('change', '#district_id', function(e) {
                var district_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: route('get.upazila'),
                    data: {
                        district_id: district_id,
                    },
                    dataType: "json",
                    success: function(response) {
                        var html = '<option selected disabled>--select upazila--</option>';
                        $.each(response, function(key, value) {
                            html +=
                                `<option value="${value.id}">${value.name}(${value.bn_name})</option>`;
                        });
                        $('#upazila_id').html(html);
                    }
                });
            });

            // get union
            $(document).on('change', '#upazila_id', function(e) {
                var upazila_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: route('get.union'),
                    data: {
                        upazila_id: upazila_id,
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);

                        var html = '<option selected disabled>--select upazila--</option>';
                        $.each(response, function(key, value) {
                            html +=
                                `<option value="${value.id}">${value.name}(${value.bn_name})</option>`;
                        });
                        $('#union_id').html(html);
                    }
                });
            });
        });
    </script>
@endpush
