<?php

use App\Http\Controllers\Backnd\BackendController;
use Illuminate\Support\Facades\Route;

// require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(BackendController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
});
