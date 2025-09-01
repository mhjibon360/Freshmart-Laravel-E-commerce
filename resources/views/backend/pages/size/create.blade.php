@extends('backend.layouts.backend-master')
@section('title', 'add new product size')
@section('content')
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <!-- page header -->
                    <div>
                        <h2 class=" text-capitalize">product size</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                        class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript::void();" class="text-inherit">size</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add New product size</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('admin.product-size.index') }}" class="btn btn-light">Back to product
                            size</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <form action="{{ route('admin.product-size.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <!-- card -->
                    <div class="card mb-6 shadow border-0">
                        <!-- card body -->
                        <div class="card-body p-6">

                            <h4 class="mb-4 h5 mt-5">size Information</h4>
                            <div class="row">
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label text-capitalize" for="size_name">size
                                        name</label>
                                    <input type="text" id="size_name" class="form-control" placeholder="size name"
                                        name="size_name" value="{{ old('size_name') }}" />
                                    @error('size_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Create size</button>
                                    <a href="{{ route('admin.product-size.index') }}"
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
