<?php

use App\Http\Controllers\Admin\LoginController as AdminLogin;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\ProductController as AdminProduct;
use App\Http\Controllers\Admin\CategoryController as AdminCategory;
use App\Http\Controllers\Admin\CouponController as AdminCoupon;

use App\Http\Controllers\Retailer\LoginController as RetailerLogin;

use Illuminate\Support\Facades\Route;


 Route::group(['middleware' => 'adminRedirect'], function () {
    Route::get('/',[AdminLogin::class,'index']);
    Route::resource('/login', AdminLogin::class);
    Route::resource('/register', RegisterController::class);
});

Route::get('otp-sent',       [AdminLogin::class,'otpSent']);
Route::post('verify-mobile', [AdminLogin::class,'verifyMobile']);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('dashboard', AdminDashboard::class);

    Route::resource('category', AdminCategory::class);
    Route::get('category-ajax', [AdminCategory::class,'ajaxList']);
    Route::post('category_status', [AdminCategory::class,'categoryStatus']);

    Route::resource('product', AdminProduct::class);
    Route::get('product-ajax', [AdminProduct::class,'ajaxList']);
    Route::post('product-status', [AdminProduct::class,'productStatus']);

    Route::resource('coupons', AdminCoupon::class);
    Route::get('coupon-ajax', [AdminCoupon::class,'ajaxList']);
    Route::post('coupon-status', [AdminCoupon::class,'couponStatus']);

    Route::post('logout',  [RetailerLogin::class, 'logout']);
});
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('dashboard', AdminDashboard::class);

    Route::post('logout',  [AdminLogin::class, 'logout']);
});