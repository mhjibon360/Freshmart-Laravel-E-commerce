<div class="position-absolute top-0 end-0 me-3 mt-3">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="row">
    <div class="col-lg-6">
        <!-- img slide -->
        @php
            $toolimages = App\Models\Multiimage::where('product_id', $product->id)->get();
        @endphp
        <div class="product productModal" id="productModal">
            <div class="zoom" onmousemove="zoom(event)"
                style="background-image: url({{ asset($product->thumbnail) }})">
                <!-- img -->
                <img src="{{ asset($product->thumbnail) }}" alt="" />
            </div>
        </div>
        <!-- product tools -->
        <div class="product-tools">
            <div class="thumbnails row g-3" id="productModalThumbnails">
                @foreach ($toolimages as $image)
                    <div class="col-3" class="tns-nav-active">
                        <div class="thumbnails-img">
                            <!-- img -->
                            <img src="{{ asset($image->photo_name) }}" alt="" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ps-lg-8 mt-6 mt-lg-0">
            <a href="#!" class="mb-4 d-block">Bakery Biscuits</a>
            <h2 class="mb-1 h1">{{ $product->product_name }}</h2>
            @php
                $review = App\Models\Review::where('product_id', $product->id)->get();
                $totalreviewcount = count($review);
                $averageRating = $review->avg('rating');
            @endphp
            <div class="mb-4">
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
                <!-- input -->
                <div class="input-group input-spinner">
                    <input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
                    <input type="number" step="1" max="10" value="1" name="quantity"
                        class="quantity-field form-control-sm form-input" />
                    <input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
                </div>
            </div>
            <div class="mt-3 row justify-content-start g-2 align-items-center">
                <div class="col-lg-4 col-md-5 col-6 d-grid">
                    <!-- button -->
                    <!-- btn -->
                    <button type="button" id="{{ $product->id }}" onclick="addToCart(this.id)"
                        class="btn btn-primary">
                        <i class="feather-icon icon-shopping-bag me-2"></i>
                        Add to cart
                    </button>
                </div>
                <div class="col-md-4 col-5">
                    <!-- btn -->
                    <a class="btn btn-light" type="button" id="{{ $product->id }}" onclick="addToCompare(this.id)"
                        data-bs-toggle="tooltip" data-bs-html="true" aria-label="Compare"><i
                            class="bi bi-arrow-left-right"></i></a>
                    <a class="btn btn-light" type="button" type="button" id="{{ $product->id }}"
                        onclick="addTowishlist(this.id)" data-bs-toggle="tooltip" data-bs-html="true"
                        aria-label="Wishlist"><i class="feather-icon icon-heart"></i></a>
                </div>
            </div>
            <hr class="my-6" />
            <div>
                <table class="table table-borderless">
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
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.button-minus', function() {
        var field = $(this).data('field');
        var input = $('input[name="' + field + '"]');
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal) && currentVal > 1) {
            input.val(currentVal - 1).change();
        }
    });

    $(document).on('click', '.button-plus', function() {
        var field = $(this).data('field');
        var input = $('input[name="' + field + '"]');
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            input.val(currentVal + 1).change();
        }
    });

    $(".segment-select").Segment();
</script>
