 <div class="col-12 col-lg-4 col-md-5">
     <!-- card -->
     <div class="mb-5 card mt-6">
         <div class="card-body p-6">
             <!-- heading -->
             <h2 class="h5 mb-4">Summary</h2>
             <div class="card mb-2">
                 <!-- list group -->
                 <ul class="list-group list-group-flush">
                     <!-- list group item -->
                     <li class="list-group-item d-flex justify-content-between align-items-start">
                         <div class="me-auto">
                             <div>Item Subtotal</div>
                         </div>
                         <span>$70.00</span>
                     </li>

                     <!-- list group item -->
                     <li class="list-group-item d-flex justify-content-between align-items-start">
                         <div class="me-auto">
                             <div>Service Fee</div>
                         </div>
                         <span>$3.00</span>
                     </li>
                     <!-- list group item -->
                     <li class="list-group-item d-flex justify-content-between align-items-start">
                         <div class="me-auto">
                             <div class="fw-bold">Subtotal</div>
                         </div>
                         <span class="fw-bold">$67.00</span>
                     </li>
                 </ul>
             </div>
             <div class="d-grid mb-1 mt-4">
                 <!-- btn -->
                 <button class="btn btn-primary btn-lg d-flex justify-content-between align-items-center"
                     type="submit">
                     Go to Checkout
                     <span class="fw-bold">$67.00</span>
                 </button>
             </div>
             <!-- text -->
             <p>
                 <small>
                     By placing your order, you agree to be bound by the Freshcart
                     <a href="#!">Terms of Service</a>
                     and
                     <a href="#!">Privacy Policy.</a>
                 </small>
             </p>

             <!-- heading -->
             @if (session()->get('coupon'))
             @else
                 <div class="mt-8 session_apply_area" id="session_apply_area">
                     <h2 class="h5 mb-3">Add Promo or Gift Card</h2>
                     <form>
                         <div class="mb-2">
                             <!-- input -->
                             <label for="coupon_name" class="form-label sr-only">Coupon Code</label>
                             <input type="text" class="form-control" name="coupon_name" id="coupon_name"
                                 placeholder="Promo or Gift Card" />
                         </div>
                         <!-- btn -->
                         <div class="d-grid"><button type="button" onclick="couponApply()"
                                 class="btn btn-outline-dark mb-1">Redeem</button></div>
                         <p class="text-muted mb-0"><small>Terms & Conditions apply</small></p>
                     </form>
                 </div>
             @endif
         </div>
     </div>
 </div>
