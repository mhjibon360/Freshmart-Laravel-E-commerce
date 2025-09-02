@extends('backend.layouts.backend-master')
@section('title', 'edit new blog-category')
@section('content')
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <!-- page header -->
                    <div>
                        <h2 class=" text-capitalize">blog-category</h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                        class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript::void();"
                                        class="text-inherit">subcategory</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">edit New blog-category</li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('admin.blog-category.index') }}" class="btn btn-light">Back to blog-category</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <form action="{{ route('admin.blog-category.update', $blogcategory->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <!-- card -->
                    <div class="card mb-6 shadow border-0">
                        <!-- card body -->
                        <div class="card-body p-6">

                            <h4 class="mb-4 h5 mt-5">blog-category Information</h4>
                            <div class="row">
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label text-capitalize" for="category_name">blog-category Name</label>
                                    <input type="text" id="category_name" class="form-control" name="category_name"
                                        value="{{ $blogcategory->category_name }}" />
                                    @error('category_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Update blog-category</button>
                                <a href="{{ route('admin.blog-category.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
