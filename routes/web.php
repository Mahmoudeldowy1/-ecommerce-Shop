<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Login And Logout
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/logout',  [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


//Routes For admins Panel
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('admin.dashboard');

    // Routes For Admins
    Route::get('/dashboard/admins',[AdminController::class,'index'])->name('admins.index');
    Route::get('/dashboard/admins/create',[AdminController::class,'create'])->name('admins.create');
    Route::post('/dashboard/admins',[AdminController::class,'store'])->name('admins.store');
    Route::get('/dashboard/admins/{admin}/edit',[AdminController::class,'edit'])->name('admins.edit');
    Route::put('/dashboard/admins/{admin}',[AdminController::class,'update'])->name('admins.update');
    Route::delete('/dashboard/admins/{admin}',[AdminController::class,'destroy'])->name('admins.destroy');

    // Routes For Categories
    Route::get('/dashboard/categories',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/dashboard/categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/dashboard/categories',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/dashboard/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/dashboard/categories/{category}',[CategoryController::class,'update'])->name('categories.update');
    Route::delete('/dashboard/categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');

    // Routes For Products
    Route::get('/dashboard/products',[ProductController::class,'index'])->name('products.index');
    Route::get('/dashboard/products/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/dashboard/products',[ProductController::class,'store'])->name('products.store');
    Route::get('/dashboard/products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
    Route::put('/dashboard/products/{product}',[ProductController::class,'update'])->name('products.update');
    Route::delete('/dashboard/products/{product}',[ProductController::class,'destroy'])->name('products.destroy');
});




