<?php

use App\Http\Controllers\Backnd\BackendController;
use Illuminate\Support\Facades\Route;

// require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::controller(BackendController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/profile', 'profile')->name('profile');
        Route::put('/update/profile', 'updateProfile')->name('update.profile');
        Route::put('/update/password', 'updatepassword')->name('update.password');
    });
});
