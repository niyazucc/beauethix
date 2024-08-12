<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/login', function () {
    return view('login');
});
Route::post('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/login', [CustomerController::class, 'login'])->name('customer.login');
Route::post('/customer/logout', [CustomerController::class, 'logout'])->name('customer.logout');
Route::get('/customer/profile', [CustomerController::class, 'edit'])->name('customer.profile.edit');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
    //product route
    Route::get('/dashboard/product', [AdminController::class, 'listproduct'])->name('admin.product');
    Route::get('/dashboard/product/add', [AdminController::class, 'showProductForm'])->name('product.add');
    Route::get('/dashboard/product/edit/{productid}', [AdminController::class, 'showProductForm'])->name('admin.product.edit');
    Route::get('/dashboard/product/view/{productid}', [AdminController::class, 'viewProduct'])->name('admin.product.view');
    Route::delete('/dashboard/product/delete/{productid}', [AdminController::class, 'deleteProduct'])->name('admin.product.delete');
    Route::post('/dashboard/product/store', [AdminController::class, 'storeProduct'])->name('product.store');
    Route::put('/dashboard/product/{productid}', [AdminController::class, 'updateProduct'])->name('product.update');
    Route::delete('/dashboard/product/{productid}/deleteImage/{image}', [AdminController::class, 'deleteImage'])->name('admin.product.deleteImage');
    //order route
    Route::get('/dashboard/orders', [OrderController::class, 'listOrders'])->name('admin.orders');
    Route::get('/dashboard/orders/manage', [OrderController::class, 'manageOrder'])->name('admin.orders.manage');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/cart', [CartController::class, 'viewmycart'])->name('cart.index');
});