@extends('frontend.layouts.frontend-master')
@section('title', $product->slug)
@section('main')
    <div class="mt-4">
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12">
                    <!-- breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="">{{ $product->slug }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->product_name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="mt-8">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-xl-6">
                    <!-- img slide -->
                    @php
                        $toolimages = App\Models\Multiimage::where('product_id', $product->id)->get();
                    @endphp
                    <div class="product" id="product">
                        @if ($toolimages->count() == 0)
                            <div class="zoom" onmousemove="zoom(event)"
                                style="background-image: url({{ asset($product->thumbnail) }})">
                                <!-- img -->
                                <!-- img -->
                                <img src="{{ asset($product->thumbnail) }}" alt="" />
                            </div>
                        @else
                            @foreach ($toolimages as $toolimage)
                                <div class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url({{ asset($toolimage->photo_name) }})">
                                    <!-- img -->
                                    <!-- img -->
                                    <img src="{{ asset($toolimage->photo_name) }}" alt="" />
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- product tools -->
                    <div class="product-tools">
                        <div class="thumbnails row g-3" id="productThumbnails">
                            @if ($toolimages->count() == 0)
                                <div class="col-3">
                                    <div class="thumbnails-img">
                                        <img src="{{ asset($product->thumbnail) }}" alt="" />
                                    </div>
                                </div>
                            @else
                                @foreach ($toolimages as $toolimage)
                                    <div class="col-3">
                                        <div class="thumbnails-img">
                                            <!-- img -->
                                            <img src="{{ asset($toolimage->photo_name) }}" alt="" />
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-xl-6">
                    <div class="ps-lg-10 mt-6 mt-md-0">
                        <!-- content -->
                        <a href="#!" class="mb-4 d-block">{{ $product->category->category_name }}</a>
                        <!-- heading -->
                        <h1 class="mb-1">{{ $product->product_name }}</h1>
                        @php
                            $review = App\Models\Review::where('product_id', $product->id)->get();
                            $totalreviewcount = count($review);
                            $averageRating = $review->avg('rating');
                        @endphp
                        <div class="mb-4">
                            <!-- rating -->
                            <!-- rating -->
                            <small class="text-warning">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= floor($averageRating))
                                        <i class="bi bi-star-fill"></i>
                                    @elseif ($i - $averageRating < 1)
                                        <i class="bi bi-star-half"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                            </small>
                            <a href="#" class="ms-2">({{ $totalreviewcount }} reviews)</a>
                        </div>
                        <div class="fs-4">
                            <!-- price -->
                            @if ($product->discount_price)
                                <span class="fw-bold text-dark">${{ $product->discount_price }}</span>
                                <span class="text-decoration-line-through text-muted">${{ $product->price }}</span>
                            @else
                                <span class="text-dark">${{ $product->price }}</span>
                            @endif

                            @php
                                $price = $product->price - $product->discount_price;
                                $discount = round(($price / $product->price) * 100);
                            @endphp
                            @if ($product->discount_price)
                                <span> <small class="fs-6 ms-2 text-danger">{{ $discount }}%Off</small> </span>
                            @elseif ($product->type == 'sale')
                                <span class="fs-6 ms-2 text-success">Sale</span>
                            @elseif ($product->type == 'hot')
                                <span class="fs-6 ms-2 text-warning">Hot</span>
                            @endif


                        </div>



                        @if ($product->colors())
                            <hr class="my-6" />
                            <div class="mb-5">
                                <select class="segment-select" id="color" name="color">
                                    @foreach ($product->colors as $color)
                                        <option value="{{ $color->color_name }}">{{ $color->color_name }}</option>
                                    @endforeach
                                </select>
                                <!-- btn -->
                            </div>
                        @endif

                        @if ($product->sizes())
                            <div class="mb-5">
                                <select class="segment-select" id="size" name="size">
                                    @foreach ($product->sizes as $size)
                                        <option value="{{ $size->size_name }}">{{ $size->size_name }}</option>
                                    @endforeach
                                </select>
                                <!-- btn -->
                            </div>
                        @endif

                        <div>
                            <!-- input -->
                            <div class="input-group input-spinner">
                                <input type="button" value="-" class="button-minus btn btn-sm"
                                    data-field="quantity" />
                                <input type="number" step="1" value="1" name="quantity" id="quantity"
                                    class="quantity-field form-control-sm form-input" />
                                <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                            </div>
                        </div>
                        <div class="mt-3 row justify-content-start g-2 align-items-center">
                            <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
                                <!-- button -->
                                <!-- btn -->
                                <button type="button" class="btn btn-primary" id="{{ $product->id }}"
                                    onclick="addToCart(this.id)">
                                    <i class="feather-icon icon-shopping-bag me-2"></i>
                                    Add to cart
                                </button>
                            </div>
                            <div class="col-md-4 col-4">
                                <!-- btn -->
                                <a class="btn btn-light" type="button" id="{{ $product->id }}"
                                    onclick="addToCompare(this.id)" data-bs-toggle="tooltip" data-bs-html="true"
                                    aria-label="Compare"><i class="bi bi-arrow-left-right"></i></a>
                                <a class="btn btn-light" type="button" id="{{ $product->id }}"
                                    onclick="addTowishlist(this.id)" data-bs-toggle="tooltip" data-bs-html="true"
                                    aria-label="Wishlist"><i class="feather-icon icon-heart"></i></a>
                            </div>
                        </div>
                        <!-- hr -->
                        <hr class="my-6" />
                        <div>
                            <!-- table -->
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td>Product Code:</td>
                                        <td>{{ $product->product_code }}</td>
                                    </tr>
                                    <tr>
                                        <td>Availability:</td>
                                        @if ($product->quantity > 0)
                                            <td>In Stock</td>
                                        @else
                                            <td>Out of Stock</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>Type:</td>
                                        <td>{{ $product->category->category_name }}</td>
                                    </tr>
                                    @if ($product->subcategory_id)
                                        <tr>
                                            <td>Subcategory:</td>
                                            <td>{{ $product->subcategory->subcategory_name }}</td>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-8">
                            <!-- dropdown -->
                            <div class="dropdown">
                                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Share</a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi bi-facebook me-2"></i>
                                            Facebook
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi bi-twitter me-2"></i>
                                            Twitter
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi bi-instagram me-2"></i>
                                            Instagram
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-lg-14 mt-8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
                        <!-- nav item -->
                        <li class="nav-item" role="presentation">
                            <!-- btn -->
                            <button class="nav-link active" id="product-tab" data-bs-toggle="tab"
                                data-bs-target="#product-tab-pane" type="button" role="tab"
                                aria-controls="product-tab-pane" aria-selected="true">
                                Product Details
                            </button>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item" role="presentation">
                            <!-- btn -->
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                data-bs-target="#details-tab-pane" type="button" role="tab"
                                aria-controls="details-tab-pane" aria-selected="false">
                                Information
                            </button>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item" role="presentation">
                            <!-- btn -->
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                data-bs-target="#reviews-tab-pane" type="button" role="tab"
                                aria-controls="reviews-tab-pane" aria-selected="false">
                                Reviews
                            </button>
                        </li>

                    </ul>
                    <!-- tab content -->
                    <div class="tab-content" id="myTabContent">
                        <!-- tab pane -->
                        <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel"
                            aria-labelledby="product-tab" tabindex="0">
                            <div class="my-8">
                                {!! $product->details !!}
                            </div>
                        </div>
                        <!-- tab pane -->
                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                            tabindex="0">
                            <div class="my-8">
                                {!! $product->informations !!}
                                
                            </div>
                        </div>
                        <!-- tab pane -->
                        <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab"
                            tabindex="0">
                            @include('frontend.layouts.partials.pdetails.review')
                        </div>
                        <!-- tab pane -->
                        <div class="tab-pane fade" id="sellerInfo-tab-pane" role="tabpanel"
                            aria-labelledby="sellerInfo-tab" tabindex="0">...</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Items -->
    @include('frontend.layouts.partials.pdetails.related-item')
@endsection
