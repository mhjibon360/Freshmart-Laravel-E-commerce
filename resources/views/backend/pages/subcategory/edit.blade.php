@extends('backend.layouts.backend-master')
@section('title', 'edit new product subcategory')
@section('content')
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <!-- page header -->
                    <div>
                        <h2 class=" text-capitalize">product subcategory</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                        class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript::void();"
                                        class="text-inherit">subcategory</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit product subcategory</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('admin.product-subcategory.index') }}" class="btn btn-light">Back to product
                            subcategory</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <form action="{{ route('admin.product-subcategory.update', $subcategory->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- card -->
                    <div class="card mb-6 shadow border-0">
                        <!-- card body -->
                        <div class="card-body p-6">

                            <h4 class="mb-4 h5 mt-5">subcategory Information</h4>
                            <div class="row">
                                <!-- input -->
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label text-capitalize" for="category_id">subcategory
                                        name</label>
                                    <select name="category_id" id="category_id"
                                        class="js-example-basic-single form-control">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach ($allcategory as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>
                                                {{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label text-capitalize" for="subcategory_name">subcategory
                                        name</label>
                                    <input type="text" id="subcategory_name" class="form-control"
                                        placeholder="subcategory name" name="subcategory_name"
                                        value="{{ $subcategory->subcategory_name }}" />
                                    @error('subcategory_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Create subcategory</button>
                                    <a href="{{ route('admin.product-subcategory.index') }}"
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
