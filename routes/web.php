<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backnd\BackendController;
use App\Http\Controllers\Frontend\FrontendController;





Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('product/details', 'productDetails')->name('product.details');
    Route::get('/shop','shop')->name('shop');
});

Route::controller(BackendController::class)->group(function () {
    Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
});
