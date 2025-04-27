<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/',[PageController::class,'home'] )->name('home');

Route::get('/products/index',[PageController::class,'index'] )->name('products.index');

Route::get('/products/create',[PageController::class,'create'] )->name('products.create')->middleware('verified');

Route::get('/products/{product}',[PageController::class,'show'] )->name('products.show')->middleware('verified');

Route::get('/products/{product}/edit',[PageController::class,'edit'] )->name('products.edit')->middleware('verified');

Route::post('/products',[PageController::class,'store'] )->name('products.store')->middleware('verified');

Route::put('/products/{product}',[PageController::class,'update'] )->name('products.update')->middleware('verified');

Route::delete('/products/{product}',[PageController::class,'destroy'] )->name('products.destroy')->middleware('verified');

Route::controller(UserController::class)->group(function () {
    Route::get('/areapersonale/{id}', 'personalArea')->name('personalArea')->middleware('verified');
});

// // rotte autenticazione 
Route::middleware(['verified'])->group(function () {
    // User dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Routes for reviewers and managers
Route::middleware(['verified', 'role:reviewer,manager'])->group(function () {
    Route::get('/review', function () {
        return view('review.dashboard');
    })->name('review.dashboard');
});

// Routes for managers only
Route::middleware(['verified', 'role:manager'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // User management routes
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
});

