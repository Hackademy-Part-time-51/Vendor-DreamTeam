<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/',[PageController::class,'home'] )->name('home');

Route::get('/products/index',[PageController::class,'index'] )->name('products.index');

Route::get('/products/create',[PageController::class,'create'] )->name('products.create')->middleware('verified');

Route::get('/products/{product}',[PageController::class,'show'] )->name('products.show')->middleware('verified');

Route::get('/products/{product}/edit', [PageController::class, 'edit'])
    ->name('products.edit')
    ->middleware(['verified']);


Route::post('/products',[PageController::class,'store'] )->name('products.store')->middleware('verified');

Route::put('/products/{product}',[PageController::class,'update'] )->name('products.update')->middleware('verified');

Route::delete('/products/{product}',[PageController::class,'destroy'] )->name('products.destroy')->middleware('verified');

Route::controller(UserController::class)->group(function () {
    Route::get('/areapersonale/{id}', 'personalArea')->name('personalArea')->middleware('verified');
});
