<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/',[PageController::class,'home'] )->name('home');

Route::get('/products/index',[PageController::class,'index'] )->name('products.index');

Route::get('/products/create',[PageController::class,'create'] )->name('products.create')->middleware('auth');

Route::get('/products/{product}',[PageController::class,'show'] )->name('products.show')->middleware('auth');

Route::get('/products/{product}/edit',[PageController::class,'edit'] )->name('products.edit')->middleware('auth');

Route::post('/products',[PageController::class,'store'] )->name('products.store')->middleware('auth');

Route::put('/products/{product}',[PageController::class,'update'] )->name('products.update')->middleware('auth');

Route::delete('/products/{product}',[PageController::class,'destroy'] )->name('products.destroy')->middleware('auth');

Route::controller(UserController::class)->group(function () {
    Route::get('/areapersonale/{id}', 'personalArea')->name('personalArea');
});