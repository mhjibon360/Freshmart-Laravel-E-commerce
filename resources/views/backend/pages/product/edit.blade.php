@extends('backend.layouts.backend-master')
@section('title', 'edit product')
@section('content')
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row mb-8">
            <div class="col-md-12">
                <div class="d-md-flex justify-content-between align-items-center">
                    <!-- page header -->
                    <div>
                        <h2 class=" text-capitalize">Edit New Product </h2>
                        <!-- breacrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                        class="text-inherit">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript::void();" class="text-inherit"></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="javascript::void();"
                                        class="text-inherit">Edit product </a></li>
                            </ol>
                        </nav>
                    </div>
                    <div>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-light">Back to product
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- row -->
            <div class="row">
                <div class="col-lg-8 col-12">
                    <!-- card -->
                    <div class="card mb-6 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <h4 class="mb-4 h5">Product Information</h4>
                            <div class="row">
                                <!-- input -->
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label" for="product_name">Product Name</label>
                                    <input type="text" class="form-control" name="product_name"
                                        value="{{ $product->product_name }}" id="product_name" />
                                    @error('product_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- input -->
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label text-capitalize" for="category_id">Product Category
                                    </label>
                                    <select name="category_id" id="category_id"
                                        class="js-example-basic-single form-control">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach ($allcategory as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label text-capitalize" for="subcategory_id">Product SubCategory
                                    </label>
                                    <select name="subcategory_id" id="subcategory_id"
                                        class="js-example-basic-single form-control">
                                        <option value="" selected disabled>Select SubCategory</option>
                                        @foreach ($allsubcategory as $subcategory)
                                            <option value="{{ $subcategory->id }}"
                                                {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                                {{ $subcategory->subcategory_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('subcategory_id')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- input -->
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label text-capitalize" for="size">Product Size
                                    </label>
                                    <select name="size[]" id="size" class="js-example-basic-multiple form-control"
                                        multiple="multiple">
                                        @foreach ($allsize as $size)
                                            <option value="{{ $size->id }}"
                                                {{ in_array($size->id, $product->sizes->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $size->size_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('size')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <div class="mb-3 col-lg-12 mt-5">
                                        <!-- heading -->
                                        <h4 class="mb-3 h5">Product Thumbnail</h4>
                                        <div class="mb-4 d-flex">
                                            <div class="position-relative">
                                                <img class="image icon-shape icon-xxxl bg-light rounded-4"
                                                    src="{{ asset($product->thumbnail) }}" alt="Image" />

                                                <div class="file-upload position-absolute end-0 top-0 mt-n2 me-n1">
                                                    <input type="file" name="image" class="file-input" />
                                                    <span class="icon-shape icon-sm rounded-circle bg-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor"
                                                            class="bi bi-pencil-fill text-muted" viewBox="0 0 16 16">
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

                                    </div>
                                </div>

                                <!-- input -->
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label text-capitalize" for="color">Product color
                                    </label>
                                    <select name="color[]" id="color" class="js-example-basic-multiple form-control"
                                        multiple="multiple">
                                        @foreach ($allcolor as $color)
                                            <option value="{{ $color->id }}"
                                                {{ in_array($color->id, $product->colors->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $color->color_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('color')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- input -->
                                <div class="mb-3 col-lg-12 mt-5">
                                    <h4 class="mb-3 h5">Product Descriptions</h4>
                                    <textarea name="details" id="editor" class=" form-control" rows="5">{{ $product->details }}</textarea>
                                    @error('details')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- input -->
                                <div class="mb-3 col-lg-12 mt-5">
                                    <h4 class="mb-3 h5">Product Information</h4>
                                    <textarea name="informations" id="editor" class=" form-control" rows="5">{{ $product->informations }}</textarea>
                                    @error('informations')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <!-- card -->
                    <div class="card mb-6 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <!-- input -->
                            <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchStock"
                                    {{ $product->quantity > 1 ? 'checked' : '' }} />
                                <label class="form-check-label" for="flexSwitchStock">In Stock</label>
                            </div>
                            <!-- input -->
                            <div>
                                <div class="mb-3">
                                    <label class="form-label">Product Code</label>
                                    <input type="text" name="product_code" value="{{ $product->product_code }}"
                                        class="form-control" />
                                    @error('product_code')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="quantity">Product Quantity</label>
                                    <input type="text" name="quantity" id="quantity"
                                        value="{{ $product->quantity }}" class="form-control" />
                                    @error('quantity')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- input -->
                                <div class="mb-3">
                                    <label class="form-label" id="productSKU">Status</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            id="inlineRadio1" value="option1"
                                            {{ $product->status == 1 ? 'checked' : '' }} />
                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                    </div>
                                    <!-- input -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            id="inlineRadio2" value="option2"
                                            {{ $product->status == 0 ? 'checked' : '' }} />
                                        <label class="form-check-label" for="inlineRadio2">Disabled</label>
                                    </div>
                                    <!-- input -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card -->
                    <div class="card mb-6 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <h4 class="mb-4 h5">Multiple Image</h4>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">Pick Image</label>
                                <input type="file" name="photo_name[]" multiple class="form-control" />
                            </div>
                        </div>
                    </div>

                    <!-- card -->
                    <div class="card mb-6 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <h4 class="mb-4 h5">Product Price</h4>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">Regular Price</label>
                                <input type="text" name="price" value="{{ $product->price }}" class="form-control"
                                    placeholder="$0.00" />
                                @error('price')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">Sale Price</label>
                                <input type="text" name="discount_price" value="{{ $product->discount_price }}"
                                    class="form-control" placeholder="$0.00" />
                                @error('discount_price')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- card -->
                    <div class="card mb-6 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <h4 class="mb-4 h5">Product Type</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input type="checkbox" {{ $product->popular_products == 1 ? 'checked' : '' }}
                                            data-toggle="toggle" id="popular_products" data-onstyle="outline-info"
                                            data-offstyle="outline-warning" value="1" name="popular_products"
                                            data-onlabel="Popular Product(yes)" data-offlabel="Popular Product(No)" />

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check my-2">
                                        <input type="checkbox" {{ $product->best_sells == 1 ? 'checked' : '' }}
                                            data-toggle="toggle" id="best_sells" data-onstyle="outline-primary"
                                            data-offstyle="outline-danger" value="1" name="best_sells"
                                            data-onlabel="Best Seller Product(yes)"
                                            data-offlabel="Best Seller Product(No)" />
                                    </div>
                                </div>
                            </div>
                            <!-- input -->
                            <div class="mb-3 col-lg-12">
                                <label class="form-label text-capitalize" for="type">Product Type
                                </label>
                                <select name="type" id="type" class="form-control">
                                    <option value="hot" {{ $product->type == 'hot' ? 'selected' : '' }}>Hot</option>
                                    <option value="sale" {{ $product->type == 'sale' ? 'selected' : '' }}>Sale</option>
                                </select>
                                @error('type')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <!-- button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Create Product</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
@push('admin_script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '#category_id', function(e) {
                e.preventDefault();
                var category_id = $(this).val();
                // alert(category_id);
                $.ajax({
                    url: route('admin.get.subcategory'),
                    type: "GET",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        var html =
                            '<option value="" selected disabled>--choose subcategory--</option>';
                        $.each(data, function(key, value) {
                            html +=
                                `<option value="${value.subcategory_name}">${value.subcategory_name}</option>`;
                        });
                        $('#subcategory_id').html(html);
                    },
                });
            });
        });
    </script>
@endpush
