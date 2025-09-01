@extends('backend.layouts.backend-master')
@section('title', 'add new product color')
@section('content')
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <!-- page header -->
                    <div>
                        <h2 class=" text-capitalize">product color</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                        class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript::void();" class="text-inherit">color</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add New product color</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('admin.product-color.index') }}" class="btn btn-light">Back to product
                            color</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <form action="{{ route('admin.product-color.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <!-- card -->
                    <div class="card mb-6 shadow border-0">
                        <!-- card body -->
                        <div class="card-body p-6">

                            <h4 class="mb-4 h5 mt-5">color Information</h4>
                            <div class="row">
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label text-capitalize" for="color_name">color
                                        name</label>
                                    <input type="text" id="color_name" class="form-control" placeholder="color name"
                                        name="color_name" value="{{ old('color_name') }}" />
                                    @error('color_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Create color</button>
                                    <a href="{{ route('admin.product-color.index') }}"
                                        class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
