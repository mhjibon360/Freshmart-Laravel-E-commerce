<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backnd\BackendController;
use App\Http\Controllers\Frontend\CouponController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('/product/details/{id}/{slug}', 'productDetails')->name('product.details');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/category/{category_slug}', 'category')->name('category');
    Route::get('/subcategory/{subcategory_slug}', 'subcategory')->name('subcategory');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/details/{slug}', 'blogdetails')->name('blog.details');
    Route::get('/blog/category/{category_slug}', 'blogcategory')->name('blog.category');
    Route::get('/compare', 'compare')->name('compare');
    Route::get('quick/view', 'quickView')->name('quick.view');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'cart')->name('cart')->middleware(['auth', 'verified']);
    Route::get('/get/minicart/product', 'getminicartProduct')->name('get.minicart.product')->middleware(['auth', 'verified']);;
    Route::get('/get/cart/product', 'getCartProduct')->name('get.cart.product')->middleware(['auth', 'verified']);;
    Route::post('/add/to/cart', 'addToCart')->name('add.to.cart');
    Route::post('/cart/product/remove', 'removeCartProduct')->name('cart.product.remove');
    Route::post('/cart/product/increment', 'incrementCartProduct')->name('cart.product.increment');
    Route::post('/cart/product/decrement', 'decrementCartProduct')->name('cart.product.decrement');
    Route::post('/cart/clear', 'Cartclear')->name('cart.clear');
});

/** wishlist all routes */
Route::controller(WishlistController::class)->group(function () {
    Route::get('/wishlist', 'wishlist')->name('wishlist')->middleware(['auth', 'verified']);
    Route::get('/wishlist/products', 'wishlistproducts')->name('wishlist.products')->middleware(['auth', 'verified']);
    Route::get('top/wishlist/counter', 'topwishlistcounter')->name('top.wishlist.counter')->middleware(['auth', 'verified']);
    Route::post('/add/to/wishlist', 'addToWishlist')->name('add.to.wishlist');
    Route::get('/get/product/wishlist', 'getproductWishlist')->name('get.product.wishlist');
    Route::post('/remove/product/wishlist', 'removeproductwishlist')->name('remove.product.wishlist');
});

/** compare all routes */
Route::controller(CompareController::class)->group(function () {
    Route::post('/add/to/compare', 'addTocompare')->name('add.to.compare');
    Route::get('/get/product/compare', 'getproductcompare')->name('get.product.compare');
    Route::get('/remove/product/compare', 'removeproductcompare')->name('remove.product.compare');
});

Route::controller(CouponController::class)->group(function () {
    Route::post('coupon/apply', 'couponapply')->name('coupon.apply');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/order', 'order')->name('order');
        Route::get('/account-setting', 'setting')->name('setting');
        Route::put('/update/profile', 'updateProfile')->name('update.profile');
        Route::put('/update/password', 'updatepassword')->name('update.password');
        Route::delete('/delete/account', 'deleteaccount')->name('delete.account');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/review', ReviewController::class);
});


require __DIR__ . '/auth.php';
