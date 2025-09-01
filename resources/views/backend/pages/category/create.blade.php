@extends('backend.layouts.backend-master')
@section('title', 'add new product category')
@section('content')
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <!-- page header -->
                    <div>
                        <h2 class=" text-capitalize">product category</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                        class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript::void();" class="text-inherit">category</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add New product category</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('admin.product-category.index') }}" class="btn btn-light">Back to product
                            category</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <form action="{{ route('admin.product-category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <!-- card -->
                    <div class="card mb-6 shadow border-0">
                        <!-- card body -->
                        <div class="card-body p-6">

                            <h4 class="mb-4 h5 mt-5">category Information</h4>
                            <div class="row">
                                <!-- input -->
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label text-capitalize" for="category_name">category name</label>
                                    <input type="text" id="category_name" class="form-control"
                                        placeholder="category name" name="category_name"
                                        value="{{ old('category_name') }}" />
                                    @error('category_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <h4 class="mb-5 h5">category Image</h4>
                                <div class="mb-4 d-flex">
                                    <div class="position-relative">
                                        <img class="image icon-shape icon-xxxl bg-light rounded-4"
                                            src="{{ asset('backend') }}/assets/images/icons/bakery.svg" alt="Image" />
                                        <div class="file-upload position-absolute end-0 top-0 mt-n2 me-n1">
                                            <input type="file" name="image" class="file-input" />
                                            <span class="icon-shape icon-sm rounded-circle bg-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-pencil-fill text-muted"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                </svg>
                                            </span>
                                        </div>
                                        @error('image')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" checked data-toggle="toggle" id="featured_category"
                                                data-onstyle="outline-info" data-offstyle="outline-warning" value="1"
                                                name="featured_category"  />
                                            <label class="form-check-label" for="featured_category"> Show As Featured
                                                Category
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input type="checkbox" checked data-toggle="toggle" id="footer_category"
                                                data-onstyle="outline-primary" data-offstyle="outline-danger" value="1"
                                                name="footer_category"  />
                                            <label class="form-check-label" for="footer_category"> Show As Footer
                                                Category
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <hr>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Create category</button>
                                    <a href="{{ route('admin.product-category.index') }}"
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
