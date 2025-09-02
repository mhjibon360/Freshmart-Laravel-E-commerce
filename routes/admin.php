<?php

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DownloadController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\SubcategoryController;


// require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::controller(BackendController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/profile', 'profile')->name('profile');
        Route::put('/update/profile', 'updateProfile')->name('update.profile');
        Route::put('/update/password', 'updatepassword')->name('update.password');
    });

    // ***************************************** website *******************
    // banner advertisement all routes
    Route::resource('/advertisement', AdsController::class);
    Route::controller(AdsController::class)->group(function () {
        Route::post('/advertisement-status', 'changeStatus')->name('advertisement.status');
    });
    //download controller all routes
    Route::resource('/download', DownloadController::class);
    //payment controller all routes
    Route::resource('/payment', PaymentController::class);
    //review controller all routes
    Route::resource('/review', ReviewController::class);
    //services controller all routes
    Route::resource('/services', ServicesController::class);
    //slider controller all routes
    Route::resource('/slider', SliderController::class);
    Route::controller(SliderController::class)->group(function () {
        Route::post('/slider-status', 'changeStatus')->name('slider.status');
    });


    // *****************************************product and product attributes *******************
    // product category all routes
    Route::resource('/product-category', CategoryController::class);
    Route::controller(CategoryController::class)->group(function () {
        Route::post('/featured-category-status', 'featuredCategoryStatus')->name('featured.category.status');
        Route::post('/footer-category-status', 'footerCategoryStatus')->name('footer.category.status');
    });

    // product subcategory all routes
    Route::resource('/product-subcategory', SubcategoryController::class);
    // product all routes
    Route::resource('/product', ProductController::class);
    Route::controller(ProductController::class)->group(function () {
        Route::get('/get-subcategory', 'getsubcategory')->name('get.subcategory');
        Route::post('/product-status', 'productstatus')->name('product.status');
        Route::post('/store-multiimage', 'storemultiimage')->name('store.multiimage');
        Route::put('/update-multiimage-by-one', 'updatemultiimagebyone')->name('update.multiimage.byone');
        Route::delete('/delete-multiimage-by-one', 'deletemultiimagebyone')->name('delete.multiimage.byone');
    });
    // product color all routes
    Route::resource('/product-color', ColorController::class);
    // product size all routes
    Route::resource('/product-size', SizeController::class);
    // coupon all routes
    Route::resource('/coupon', CouponController::class);
    Route::controller(CouponController::class)->group(function () {
        Route::post('/coupon-status', 'couponStatus')->name('coupon.status');
    });

    // order all routes
    Route::controller(OrderController::class)->group(function () {
        Route::get('/order/pending', 'pending')->name('order.pending');
        Route::get('/order/confirmed', 'confirmed')->name('order.confirmed');
        Route::get('/order/processing', 'processing')->name('order.processing');
        Route::get('/order/picked', 'picked')->name('order.picked');
        Route::get('/order/shipped', 'shipped')->name('order.shipped');
        Route::get('/order/delivered', 'delivered')->name('order.delivered');
        Route::get('/order/cancel', 'cancel')->name('order.cancel');
        Route::get('/order/invoice/{id}', 'invoice')->name('order.invoice');
        Route::get('/order/invoice/download/{id}', 'invoiceDownload')->name('invoice.download');
    });


    // *****************************************blog *******************
    // blog category all routes
    Route::resource('/blog-category', BlogCategoryController::class);
    // blog post all routes
    Route::resource('/blog-post', BlogPost::class);

    // *****************************************settings *******************
    Route::controller(SettingController::class)->group(function () {
        Route::get('/settings', 'index')->name('settings');
        Route::get('/general/settings', 'generalSettings')->name('general.settings');
        Route::put('/general/settings/update', 'generalSettingsUpdate')->name('general.settings.update');
        Route::get('/seo/settings', 'seoSettings')->name('seo.settings');
        Route::put('/seo/settings/update', 'seoSettingsUpdate')->name('seo.settings.update');
    });
});
