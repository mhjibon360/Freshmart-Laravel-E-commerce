 <section class="my-lg-14 my-8">
     <div class="container">
         <div class="row">
             <div class="col-12 mb-6">
                 <h3 class="mb-0">Popular Products</h3>
             </div>
         </div>

         <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
             @foreach ($popularproducts as $product)
                 <div class="col">
                     <div class="card card-product">
                         <div class="card-body">
                             <div class="text-center position-relative">
                                 <div class="position-absolute top-0 start-0">
                                     @php
                                         $price = $product->price - $product->discount_price;
                                         $discount = round(($price / $product->price) * 100);
                                     @endphp
                                     @if ($product->discount_price)
                                         <span class="badge bg-success">{{ $discount }}%</span>
                                     @elseif ($product->type == 'sale')
                                         <span class="badge bg-danger">Sale</span>
                                     @elseif ($product->type == 'hot')
                                         <span class="badge bg-warning">Hot</span>
                                     @endif
                                 </div>
                                 <a href="{{ route('product.details', [$product->id, $product->slug]) }}">
                                     <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->product_name }}"
                                         class="mb-3 img-fluid" /></a>

                                 <div class="card-product-action">
                                     <a type="button" id="{{ $product->id }}" onclick="productView(this.id)" class="btn-action" data-bs-toggle="modal"
                                         data-bs-target="#quickViewModal">
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
                             <h2 class="fs-6"><a href="{{ route('product.details', [$product->id, $product->slug]) }}"
                                     class="text-inherit text-decoration-none">{!! $product->product_name !!}</a></h2>
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
                                 <span class="text-muted small">({{ $totalreviewcount }})</span>
                             </div>
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
                                 <div>
                                     <a type="button" id="{{ $product->id }}" onclick="addToCart(this.id)"
                                         class="btn btn-primary btn-sm">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-plus">
                                             <line x1="12" y1="5" x2="12" y2="19">
                                             </line>
                                             <line x1="5" y1="12" x2="19" y2="12">
                                             </line>
                                         </svg>
                                         Add
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             @endforeach

         </div>
     </div>
 </section>
