<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backnd\BackendController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('product/details', 'productDetails')->name('product.details');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/category/category-name', 'category')->name('category');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/details', 'blogdetails')->name('blog.details');
    Route::get('/blog/category', 'blogcategory')->name('blog.category');
    Route::get('/wishlist', 'wishlist')->name('wishlist');
    Route::get('/compare', 'compare')->name('compare');
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



require __DIR__ . '/auth.php';
