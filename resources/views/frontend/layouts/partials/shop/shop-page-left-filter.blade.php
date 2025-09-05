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

            <div class="mb-8">
                <h5 class="mb-3">Color</h5>

                <!-- form check -->
                @foreach ($allcolors as $color)
                    <div class="form-check mb-2">
                        <!-- input -->
                        <input class="form-check-input" type="checkbox" value="{{ $color->color_name }}"
                            id="eGrocery-{{ $color->id }}" />
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
                        <input class="form-check-input" type="checkbox" value="{{ $size->size_name }}"
                            id="size-{{ $size->id }}" />
                        <label class="form-check-label" for="size-{{ $size->id }}">{{ $size->size_name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-8">
                <!-- price -->
                <h5 class="mb-3">Price</h5>
                <div>
                    <!-- range -->
                    <div id="priceRange" class="mb-3"></div>
                    <small class="text-muted">Price:</small>
                    <span id="priceRange-value" class="small"></span>
                </div>
            </div>

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
