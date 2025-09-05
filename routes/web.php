<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backnd\BackendController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('product/details/{id}/{slug}', 'productDetails')->name('product.details');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/category/category-name', 'category')->name('category');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/details', 'blogdetails')->name('blog.details');
    Route::get('/blog/category', 'blogcategory')->name('blog.category');
    Route::get('/wishlist', 'wishlist')->name('wishlist');
    Route::get('/compare', 'compare')->name('compare');
    Route::get('quick/view', 'quickView')->name('quick.view');
});

Route::controller(CartController::class)->group(function () {
    Route::post('/add/to/cart', 'addToCart')->name('add.to.cart');
    Route::get('/get/cart/product', 'getCartProduct')->name('get.cart.product');
    Route::get('/cart/product/remove', 'removeCartProduct')->name('cart.product.remove');
    Route::post('/update/cart/product', 'updateCartProduct')->name('update.cart.product');
});

/** wishlist all routes */
Route::controller(WishlistController::class)->group(function () {
    Route::post('/add/to/wishlist', 'addToWishlist')->name('add.to.wishlist');
    Route::get('/get/product/wishlist', 'getproductWishlist')->name('get.product.wishlist');
    Route::get('/remove/product/wishlist', 'removeproductwishlist')->name('remove.product.wishlist');
});

/** compare all routes */
Route::controller(CompareController::class)->group(function () {
    Route::post('/add/to/compare', 'addTocompare')->name('add.to.compare');
    Route::get('/get/product/compare', 'getproductcompare')->name('get.product.compare');
    Route::get('/remove/product/compare', 'removeproductcompare')->name('remove.product.compare');
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
