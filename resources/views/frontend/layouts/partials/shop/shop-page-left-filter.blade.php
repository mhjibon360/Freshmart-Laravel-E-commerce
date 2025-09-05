<aside class="col-lg-3 col-md-4 mb-6 mb-md-0">
    <div class="offcanvas offcanvas-start offcanvas-collapse w-md-50" tabindex="-1" id="offcanvasCategory"
        aria-labelledby="offcanvasCategoryLabel">
        <div class="offcanvas-header d-lg-none">
            <h5 class="offcanvas-title" id="offcanvasCategoryLabel">Filter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ps-lg-2 pt-lg-0">
            <div class="mb-8">
                <!-- title -->
                <h5 class="mb-3">Categories</h5>
                <!-- nav -->
                <ul class="nav nav-category" id="categoryCollapseMenu">
                    @foreach ($allcategorys as $category)
                        <li class="nav-item border-bottom w-100">
                            <a href="#" class="nav-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#categoryFlushOne-{{ $category->id }}" aria-expanded="false"
                                aria-controls="categoryFlushOne">
                                {{ $category->category_name }}
                                <i class="feather-icon icon-chevron-right"></i>
                            </a>
                            <!-- accordion collapse -->
                            <div id="categoryFlushOne-{{ $category->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#categoryCollapseMenu">
                                <div>
                                    <!-- nav -->

                                    <ul class="nav flex-column ms-3">
                                        @php
                                            $subcategory = App\Models\Subcategory::where(
                                                'category_id',
                                                $category->id,
                                            )->get();
                                        @endphp
                                        <!-- nav item -->
                                        @foreach ($subcategory as $subcat)
                                            <li class="nav-item"><a
                                                    href="{{ route('subcategory', $subcat->subcategory_slug) }}"
                                                    class="nav-link">{{ $subcat->subcategory_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <form method="GET" action="{{ route('shop') }}">
                @csrf
                @method('GET')
                <div class="mb-8">
                    <h5 class="mb-3">Color</h5>

                    <!-- form check -->
                    @foreach ($allcolors as $color)
                        <div class="form-check mb-2">
                            <!-- input -->
                            <input name="filter[colors.id][]" class="form-check-input" type="checkbox"
                                value="{{ $color->id }}" id="eGrocery-{{ $color->id }}"
                                {{ in_array($color->id, request()->input('filter.colors.id', [])) ? 'checked' : '' }} />
                            <label class="form-check-label"
                                for="eGrocery-{{ $color->id }}">{{ $color->color_name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-8">
                    <h5 class="mb-3">Size</h5>

                    <!-- form check -->
                    @foreach ($allsize as $size)
                        <div class="form-check mb-2">
                            <!-- input -->
                            <input name="filter[sizes.id][]" class="form-check-input" type="checkbox"
                                value="{{ $size->id }}" id="size-{{ $size->id }}"
                                {{ in_array($size->id, request()->input('filter.sizes.id', [])) ? 'checked' : '' }} />
                            <label class="form-check-label"
                                for="size-{{ $size->id }}">{{ $size->size_name }}</label>
                        </div>
                    @endforeach
                </div>

                @php
                    $minPrice = \App\Models\Product::where('status', 1)->min('price') ?? 0;
                    $maxPrice = \App\Models\Product::where('status', 1)->max('price') ?? 1000;
                @endphp
                <div class="mb-8">
                    <h5 class="mt-3">Price</h5>
                    <div id="priceRange" class="mb-3"></div>
                    <small class="text-muted">Price:</small>
                    <span id="priceRange-value" class="small"></span>

                    <!-- Hidden inputs with dynamic default -->
                    <input type="hidden" name="price_min" id="price_min"
                        value="{{ request('price_min', $minPrice) }}">
                    <input type="hidden" name="price_max" id="price_max"
                        value="{{ request('price_max', $maxPrice) }}">
                </div>
                <div class="my-3">
                    <button type="submit" class="btn btn-primary">Apply Filter</button>
                </div>
            </form>

            <div class="mb-8 position-relative">
                <!-- Banner Design -->
                <!-- Banner Content -->
                <!-- Advertisement-->
                @include('frontend.layouts.partials.random-ads')
                <!-- Banner Content -->
            </div>
        </div>
    </div>
</aside>
@push('frontend-script')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.2.0/wNumb.min.js"></script>
    <script>
        var l = document.getElementById("priceRange");
        if (l) {
            noUiSlider.create(l, {
                connect: true,
                behaviour: "tap",
                start: [
                    {{ request('price_min', $minPrice) }},
                    {{ request('price_max', $maxPrice) }}
                ],
                range: {
                    min: {{ $minPrice }},
                    max: {{ $maxPrice }}
                },
                format: wNumb({
                    decimals: 0
                })
            });

            var s = document.getElementById("priceRange-value");
            var inputMin = document.getElementById("price_min");
            var inputMax = document.getElementById("price_max");

            l.noUiSlider.on("update", function(values) {
                s.innerHTML = "$" + values[0] + " - $" + values[1];
                inputMin.value = Math.floor(values[0]);
                inputMax.value = Math.floor(values[1]);
            });
        }
    </script>
@endpush
