 <nav class="navbar-vertical-nav d-none d-xl-block">
     <div class="navbar-vertical">
         <div class="px-4 py-5">
             <a href="{{ route('admin.dashboard') }}" class="navbar-brand">
                 <img src="{{ asset('backend') }}/assets/images/logo/freshcart-logo.svg" alt="" />
             </a>
         </div>
         <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
             <ul class="navbar-nav flex-column" id="sideNavbar">
                 <li class="nav-item">
                     <a class="nav-link  active " href="{{ route('admin.dashboard') }}">
                         <div class="d-flex align-items-center">
                             <span class="nav-link-icon"><i class="bi bi-house"></i></span>
                             <span class="nav-link-text">Dashboard</span>
                         </div>
                     </a>
                 </li>
                 <li class="nav-item mt-6 mb-3">
                     <span class="nav-label">Website Managements</span>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="{{ route('admin.slider.index') }}">
                         <div class="d-flex align-items-center">
                             <span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
                             <span class="nav-link-text">Manage Slider</span>
                         </div>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="{{ route('admin.advertisement.index') }}">
                         <div class="d-flex align-items-center">
                             <span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
                             <span class="nav-link-text">Manage Advertisement</span>
                         </div>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="{{ route('admin.services.index') }}">
                         <div class="d-flex align-items-center">
                             <span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
                             <span class="nav-link-text">Manage Services</span>
                         </div>
                     </a>
                 </li>
                 <li class="nav-item mt-6 mb-3">
                     <span class="nav-label">Store Managements</span>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="{{ route('admin.product-category.index') }}">
                         <div class="d-flex align-items-center">
                             <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                             <span class="nav-link-text">Product Category</span>
                         </div>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="{{ route('admin.product-subcategory.index') }}">
                         <div class="d-flex align-items-center">
                             <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                             <span class="nav-link-text">Product SubCategory</span>
                         </div>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="{{ route('admin.product-color.index') }}">
                         <div class="d-flex align-items-center">
                             <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                             <span class="nav-link-text">Product Color</span>
                         </div>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                         data-bs-target="#navCategoriesOrders" aria-expanded="false"
                         aria-controls="navCategoriesOrders">
                         <div class="d-flex align-items-center">
                             <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                             <span class="nav-link-text">Manage Product</span>
                         </div>
                     </a>
                     <div id="navCategoriesOrders" class="collapse " data-bs-parent="#sideNavbar">
                         <ul class="nav flex-column">
                            <!-- Nav item -->
                             <li class="nav-item">
                                 <a class="nav-link " href="{{ route('admin.product.create') }}">Add Product</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link " href="{{ route('admin.product.index') }}">All Product</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link " href="order-list.html">Active Product</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link " href="order-list.html">Deactive Product</a>
                             </li>
                         </ul>
                     </div>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
