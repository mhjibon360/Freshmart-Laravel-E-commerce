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
});



Route::controller(UserController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/order', 'order')->name('order');
    Route::get('/setting', 'setting')->name('setting');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::controller(BackendController::class)->group(function () {
    Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
});
