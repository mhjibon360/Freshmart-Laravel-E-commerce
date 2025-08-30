<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backnd\BackendController;
use App\Http\Controllers\Frontend\FrontendController;


Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('product/details', 'productDetails')->name('product.details');
    Route::get('/shop','shop')->name('shop');
    Route::get('/cart','cart')->name('cart');
    Route::get('/checkout','checkout')->name('checkout');
    Route::get('/category/category-name','category')->name('category');
    Route::get('/blog','blog')->name('blog');
    Route::get('/blog/details','blogdetails')->name('blog.details');
    Route::get('/blog/category','blogcategory')->name('blog.category');

});

Route::controller(BackendController::class)->group(function () {
    Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
});
