<?php

use Illuminate\Support\Facades\Route;

// Admin Controller
use App\http\Controllers\Admin\DashboardController;
use App\http\Controllers\Admin\CategoryController;
use App\http\Controllers\Admin\SubCategoryController;
use App\http\Controllers\Admin\ProductController;
use App\http\Controllers\Admin\AdminController;
use App\http\Controllers\Admin\OrderController;

// User Controller
use App\http\Controllers\HomeController;
use App\http\Controllers\CartController;
use App\http\Controllers\CustomerController;
use App\http\Controllers\ShippingController;
use App\http\Controllers\ProfileController;




// Front route Mangmant Systeam
Route::controller(HomeController::class)->group(function(){
    Route::get('/','Index')->name('home');
    Route::get('/category/{id}/{slug}','CategoryProduct')->name('categoryWiseProduct');
    Route::get('/sub-category/{id}/{slug}','SubCategoryProduct')->name('sub-categoryWiseProduct');
    Route::get('/details/{id}/{slug}','ProductDetails')->name('product.details');
});
// Cart Route Controller
Route::middleware('customerAuth')->controller(CartController::class)->group(function(){
    Route::post('/cart','Index')->name('cart');
    Route::get('/cart-items','CartItems')->name('cart.items');
    Route::get('/remove-cart/{id}','RemoveCart')->name('remove.cart');
    Route::post('/customer-order','Order')->name('customer.order');
});
// Shipping Controller
Route::middleware('customerAuth')->controller(ShippingController::class)->group(function (){
    Route::get('/shipping-address','index')->name('customer.shipping');
    Route::post('/shipping-address/store','Store')->name('customer.shipping.store');
    Route::get('/place-order','PlaceOrder')->name('place.order');
});
// Profile Controller
Route::middleware('customerAuth')->controller(ProfileController::class)->group(function (){
    Route::get('/profile','profile')->name('profile');
    Route::get('/profile/dashboard','dashboard')->name('profile.dashboard');
    Route::get('/profile/pending-order','PendingOrder')->name('PendingOrder');
    Route::get('/profile/order-history','OrderHistory')->name('OrderHistory');
});

// Customer Auth
Route::prefix('auth')->group(function(){
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/login', 'authenticate')->name('customer.auth');
        Route::post('/user/login', 'login')->name('customer.login');
        Route::get('/register', 'register')->name('customer.register');
        Route::post('/user/register', 'store')->name('register.store');
        Route::get('/user/logout','LogOut')->name('user.logout');
    });
});

// Admin Authentication ============================================================
Route::prefix('admin')->group(function(){
    Route::get('auth',[AdminController::class,'Index'])->name('login.page');
    Route::post('auth/login',[AdminController::class,'AdminLogin'])->name('admin.login');
    Route::get('auth/log-out',[AdminController::class,'AdminLogOut'])->name('admin.logout');
});
// Admin route Mangmant Systeam
Route::middleware('adminAuth')->prefix('admin')->group(function () {
    // Dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'Index')->name('dashboard');
    });
    // Category
    Route::resource('/category', CategoryController::class);
    Route::get('/category/status/{id}',[CategoryController::class,'status'])->name('category.status');
    // Sub Category
    Route::resource('/sub-category', SubCategoryController::class);
    Route::get('/sub-category/status/{id}',[SubCategoryController::class,'status'])->name('sub-category.status');
    // Product
    Route::resource('/product',ProductController::class);
    Route::get('/product/status/{id}',[ProductController::class,'status'])->name('product.status');
    // Order
    Route::get('/pending-order',[OrderController::class,'pending'])->name('pending.order');
    Route::get('/complete-order',[OrderController::class,'complete'])->name('complete.order');
    Route::get('/order-status/{id}',[OrderController::class,'Status'])->name('order.status');
});
