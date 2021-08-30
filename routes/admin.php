<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductControlller;
use Illuminate\Support\Facades\Route;




//------------ PRODUCTS ROUTES -------------//
Route::group(['prefix' => 'products'], function () {
  Route::get('/index',[ProductControlller::class,'index'])->name('product.index');
  Route::get('/create', [ProductControlller::class, 'create'])->name('product.create');
  Route::post('/store', [ProductControlller::class, 'store'])->name('product.store');
  Route::get('/edit/{id}',[ProductControlller::class,'edit'])->name('product.edit');
  Route::get('/delimg/{id}',[ProductControlller::class,'delImage'])->name('product.delimg');
});

//------------ CATEGORIES ROUTES -------------//
Route::group(['prefix' => 'categories'], function () {
  Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
  Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
});

//------------ BRANDS ROUTES -------------//
Route::group(['prefix' => 'brands'],function(){
Route::get('/create',[BrandController::class,'create'])->name('brand.create');
Route::post('/store',[BrandController::class,'store'])->name('brand.store');
});
