 <div class="col-md-12 offset-xl-1 col-xl-4 col-lg-6">
     <div class="mt-4 mt-lg-0">
         <div class="card shadow-sm">
             <h5 class="px-6 py-4 bg-transparent mb-0">Order Details</h5>
             <ul class="list-group list-group-flush">
                 <!-- list group item -->
                 @foreach (Cart::content() as $cart)
                     <li class="list-group-item px-4 py-3">
                         <div class="row align-items-center">
                             <div class="col-2 col-md-2">
                                 <img src="{{ asset($cart->options->image) }}" alt="Ecommerce" class="img-fluid" />
                             </div>
                             <div class="col-5 col-md-5">
                                 <h6 class="mb-0">{{ $cart->name }}</h6>
                                 @if ($cart->options->size)
                                     <span><small class="text-muted">{{ $cart->options->size }}</small></span>
                                 @endif
                                 @if ($cart->options->size)
                                     / <span><small class="text-muted">{{ $cart->options->color }}</small></span>
                                 @endif
                             </div>
                             <div class="col-2 col-md-2 text-center text-muted">
                                 <span>{{ $cart->qty }}</span>
                             </div>
                             <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                 <span class="fw-bold">${{ $cart->price }}</span>
                             </div>
                         </div>
                     </li>
                 @endforeach

                 @if (Session()->has('coupon'))
                     <!-- list group item -->
                     <li class="list-group-item px-4 py-3">
                         <div class="d-flex align-items-center justify-content-between mb-2">
                             <div>Coupon Name</div>
                             <div class="fw-bold"> <span
                                     class="badge bg-light-primary text-dark-primary">{{ Session()->get('coupon')['coupon_name'] }}</span>
                             </div>
                         </div>
                         <div class="d-flex align-items-center justify-content-between mb-2">
                             <div>Coupon Discount</div>
                             <div class="fw-bold">
                                 <div class="badge bg-light-warning text-dark-warning">
                                     {{ Session()->get('coupon')['coupon_discount'] }}%</div>
                             </div>
                         </div>
                     </li>


                     <li class="list-group-item px-4 py-3">
                         <div class="d-flex align-items-center justify-content-between fw-bold">
                             <div>Item Subtotal</div>
                             <div>${{ Cart::total() }}</div>
                         </div>
                     </li>
                     <!-- list group item -->
                     <li class="list-group-item px-4 py-3">
                         <div class="d-flex align-items-center justify-content-between fw-bold">
                             <div>Discount Amount</div>
                             <div>${{ Session()->get('coupon')['discount_amount'] }}</div>
                         </div>
                     </li>
                     <li class="list-group-item px-4 py-3">
                         <div class="d-flex align-items-center justify-content-between fw-bold">
                             <div>Total</div>
                             <div>${{ Session()->get('coupon')['total_amount'] }}</div>
                         </div>
                     </li>
                 @else
                     <!-- list group item -->
                     <li class="list-group-item px-4 py-3">
                         <div class="d-flex align-items-center justify-content-between mb-2">
                             <div>Item Subtotal</div>
                             <div class="fw-bold">${{ Cart::total() }}</div>
                         </div>
                     </li>

                     <!-- list group item -->
                     <li class="list-group-item px-4 py-3">
                         <div class="d-flex align-items-center justify-content-between fw-bold">
                             <div>Subtotal</div>
                             <div>${{ Cart::total() }}</div>
                         </div>
                     </li>
                 @endif


             </ul>
         </div>
     </div>
 </div>
