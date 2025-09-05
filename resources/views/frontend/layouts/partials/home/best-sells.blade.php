<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-6">
                <h3 class="mb-0">Daily Best Sells</h3>
            </div>
        </div>
        <div class="table-responsive-lg pb-6">
            <div class="row row-cols-lg-4 row-cols-1 row-cols-md-2 g-4 flex-nowrap">
                @php
                    $advertisement = App\Models\Ads::where('status', 1)->inRandomOrder()->take(1)->get();
                @endphp
                @foreach ($advertisement as $ads)
                    <div class="col">
                        <div class="pt-8 px-6 px-xl-8 rounded text-dark"
                            style="background: url({{ asset($ads->image) }}) no-repeat; background-size: cover; height: 470px; background-position:top right;">
                            <div>
                                <h3 class="fw-bold text-black">{{ $ads->heading }}</h3>
                                <p class="text-black">{{ $ads->discount_title }}</p>
                                <a href="{{ route('shop') }}" class="btn btn-primary">
                                    Shop Now
                                    <i class="feather-icon icon-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                @php
                    $best_sells = App\Models\Product::where('status', 1)
                        ->where('best_sells', 1)
                        ->inRandomOrder()
                        ->take(3)
                        ->get();
                @endphp
                @foreach ($best_sells as $product)
                    <div class="col">
                        <div class="card card-product">
                            <div class="card-body">
                                <div class="text-center position-relative">
                                    <a href="{{ route('product.details', [$product->id, $product->slug]) }}"><img
                                            src="{{ asset($product->thumbnail) }}" alt="Grocery Ecommerce Template"
                                            class="mb-3 img-fluid" /></a>

                                    <div class="card-product-action">
                                        <a class="btn-action" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                            id="{{ $product->id }}" onclick="productView(this.id)">
                                            <i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true"
                                                title="Quick View"></i>
                                        </a>
                                        <a type="button" id="{{ $product->id }}" onclick="addTowishlist(this.id)"
                                            class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                            title="Wishlist"><i class="bi bi-heart"></i></a>
                                        <a type="button" id="{{ $product->id }}" onclick="addToCompare(this.id)"
                                            class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                            title="Compare"><i class="bi bi-arrow-left-right"></i></a>
                                    </div>
                                </div>
                                <div class="text-small mb-1">
                                    <a href="#!"
                                        class="text-decoration-none text-muted"><small>{{ $product->category->category_name }}</small></a>
                                </div>
                                <h2 class="fs-6"><a
                                        href="{{ route('product.details', [$product->id, $product->slug]) }}"
                                        class="text-inherit text-decoration-none">{{ $product->product_name }}</a></h2>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div>
                                        @if ($product->discount_price)
                                            <span class="text-dark">${{ $product->discount_price }}</span>
                                            <span
                                                class="text-decoration-line-through text-muted">${{ $product->price }}</span>
                                        @else
                                            <span class="text-dark">${{ $product->price }}</span>
                                        @endif
                                    </div>

                                    @php

                                        $review = App\Models\Review::where('product_id', $product->id)->get();
                                        $totalreviewcount = count($review);
                                        $averageRating = $review->avg('rating');

                                    @endphp
                                    <div>
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
                                        <span><small>{{ $averageRating }}</small></span>
                                    </div>
                                </div>
                                <div class="d-grid mt-2">
                                    <a id="{{ $product->id }}" onclick="addToCart(this.id)" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add to cart
                                    </a>
                                </div>
                                <div class="d-flex justify-content-start text-center mt-3">
                                    <div class="deals-countdown w-100" data-countdown="2028/10/10 00:00:00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
