<div class="my-8">
    <!-- row -->
    <div class="row">
        <div class="col-md-4">
            <div class="me-lg-12 mb-6 mb-md-0">
                <div class="mb-5">
                    <!-- title -->
                    <h4 class="mb-3">Customer reviews</h4>
                    <span>
                        <!-- rating -->
                        <small class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </small>
                        <span class="ms-3">4.1 out of 5</span>
                        <small class="ms-3">11,130 global ratings</small>
                    </span>
                </div>
                <div class="mb-8">
                    <!-- progress -->
                    <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3 text-muted">
                            <span class="d-inline-block align-middle text-muted">5</span>
                            <i class="bi bi-star-fill ms-1 small text-warning"></i>
                        </div>
                        <div class="w-100">
                            <div class="progress" style="height: 6px">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <span class="text-muted ms-3">53%</span>
                    </div>
                    <!-- progress -->
                    <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3 text-muted">
                            <span class="d-inline-block align-middle text-muted">4</span>
                            <i class="bi bi-star-fill ms-1 small text-warning"></i>
                        </div>
                        <div class="w-100">
                            <div class="progress" style="height: 6px">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 50%"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="50"></div>
                            </div>
                        </div>
                        <span class="text-muted ms-3">22%</span>
                    </div>
                    <!-- progress -->
                    <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3 text-muted">
                            <span class="d-inline-block align-middle text-muted">3</span>
                            <i class="bi bi-star-fill ms-1 small text-warning"></i>
                        </div>
                        <div class="w-100">
                            <div class="progress" style="height: 6px">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 35%"
                                    aria-valuenow="35" aria-valuemin="0" aria-valuemax="35"></div>
                            </div>
                        </div>
                        <span class="text-muted ms-3">14%</span>
                    </div>
                    <!-- progress -->
                    <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3 text-muted">
                            <span class="d-inline-block align-middle text-muted">2</span>
                            <i class="bi bi-star-fill ms-1 small text-warning"></i>
                        </div>
                        <div class="w-100">
                            <div class="progress" style="height: 6px">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 22%"
                                    aria-valuenow="22" aria-valuemin="0" aria-valuemax="22"></div>
                            </div>
                        </div>
                        <span class="text-muted ms-3">5%</span>
                    </div>
                    <!-- progress -->
                    <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3 text-muted">
                            <span class="d-inline-block align-middle text-muted">1</span>
                            <i class="bi bi-star-fill ms-1 small text-warning"></i>
                        </div>
                        <div class="w-100">
                            <div class="progress" style="height: 6px">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 14%"
                                    aria-valuenow="14" aria-valuemin="0" aria-valuemax="14"></div>
                            </div>
                        </div>
                        <span class="text-muted ms-3">7%</span>
                    </div>
                </div>
                <div class="d-grid">
                    <h4>Review this product</h4>
                    <p class="mb-0">Share your thoughts with other customers.</p>
                    <a href="#" class="btn btn-outline-gray-400 mt-4 text-muted">Write
                        the Review</a>
                </div>
            </div>
        </div>
        <!-- col -->
        <div class="col-md-8">
            <div class="mb-10">
                <div class="d-flex justify-content-between align-items-center mb-8">
                    <div>
                        <!-- heading -->
                        <h4>Reviews</h4>
                    </div>
                </div>
                @php
                    $allreview = App\Models\Review::with('users')->where('product_id', $product->id)->get();
                    $rating = 0;
                @endphp

                @foreach ($allreview as $review)
                    <div class="d-flex border-bottom pb-6 mb-6 pt-4">
                        <!-- img -->
                        <img src="{{ isset($review->users->photo) ? asset($review->users->photo) : Avatar::create(Auth::user()->name)->toBase64() }}"
                            alt="" class="rounded-circle avatar-lg" />
                        <div class="ms-5 flex-grow-1">
                            <h6 class="mb-1">{{ $review->users->name }}</h6>
                            <!-- content -->
                            <p class="small">
                                <span class="text-muted"> {{ $review->created_at->format(' d F Y') }}</span>
                                <span class="text-danger ms-3 fw-bold">Unverified Purchase</span>
                            </p>

                            <!-- rating -->
                            <div class="mb-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i
                                        class="bi {{ $i <= $review->rating ? 'bi-star-fill text-warning' : 'bi-star text-warning' }}"></i>
                                @endfor
                            </div>
                            <p>{!! $review->message !!}</p>

                            @php
                                $reviewimage = App\Models\ReviewImage::where('review_id', $review->id)->get();
                            @endphp

                            <div>
                                @foreach ($reviewimage as $images)
                                    <div class="border icon-shape icon-lg border-2">
                                        <!-- img -->
                                        <img src="{{ asset($images->image) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                @endforeach
                            </div>

                            <!-- icon -->
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#" class="text-muted">
                                    <i class="feather-icon icon-thumbs-up me-1"></i>
                                    Helpful
                                </a>
                                <a href="#" class="text-muted ms-4">
                                    <i class="feather-icon icon-flag me-2"></i>
                                    Report abuse
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div>
                    <a href="#" class="btn btn-outline-gray-400 text-muted">Read More
                        Reviews</a>
                </div>
            </div>
            <div>
                <!-- rating -->
                <h3 class="mb-5">Create Review</h3>

                <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div id="product-rating"></div>
                    <input type="hidden" id="rating-value" name="rating">

                    <div class="py-4 mb-4">
                        <!-- heading -->
                        <h5>Add a written review <span style="cursor:pointer;"
                                class="badge bg-light-primary text-dark-primary add_image" id="add_image">Add
                                Image</span></h5>
                        <textarea class="form-control" rows="3" name="message"
                            placeholder="What did you like or dislike? What did you use this product for?"></textarea>
                        @error('message')
                            <span class=" text-danger">{{ $message }}</span>
                        @enderror

                        <div class="mb-3 image_box" id="image_box" style="display:none;">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image[]" multiple
                                id="image" />
                            @error('image')
                                <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <!-- button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
