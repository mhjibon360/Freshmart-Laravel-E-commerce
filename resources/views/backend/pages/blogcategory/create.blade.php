@extends('backend.layouts.backend-master')
@section('title', 'add new coupon')
@section('content')
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <!-- page header -->
                    <div>
                        <h2 class=" text-capitalize">coupon</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                        class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript::void();"
                                        class="text-inherit">subcategory</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add New coupon</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('admin.coupon.index') }}" class="btn btn-light">Back to coupon</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <form action="{{ route('admin.coupon.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <!-- card -->
                    <div class="card mb-6 shadow border-0">
                        <!-- card body -->
                        <div class="card-body p-6">

                            <h4 class="mb-4 h5 mt-5">coupon Information</h4>
                            <div class="row">

                                <div class="mb-3 col-lg-6">
                                    <label class="form-label text-capitalize" for="coupon_name">Coupon Name</label>
                                    <input type="text" id="coupon_name" class="form-control" name="coupon_name"
                                        value="{{ old('coupon_name') }}" />
                                    @error('coupon_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label text-capitalize" for="coupon_discount">Coupon Discount</label>
                                    <input type="text" id="coupon_discount" class="form-control" name="coupon_discount"
                                        value="{{ old('coupon_discount') }}" />
                                    @error('coupon_discount')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label text-capitalize" for="coupon_validity">Coupon Expired
                                        Date</label>
                                    <input type="date" id="coupon_validity" class="form-control" name="coupon_validity"
                                        value="{{ old('coupon_validity') }}"   min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" />
                                    @error('coupon_validity')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Create Coupon</button>
                                <a href="{{ route('admin.coupon.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                            </div>
                        </div>


                    </div>
            </div>
        </div>
        </form>
    </div>
    </div>
    </div>
@endsection
