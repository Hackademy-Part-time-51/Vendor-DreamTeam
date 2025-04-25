<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
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
    Route::get('/areapersonale/{id}', 'personalArea')->name('personalArea')->middleware('auth');
});

// // rotte autenticazione 
Route::middleware(['auth'])->group(function () {
    // User dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Article routes for all authenticated users
    Route::get('/articles', [PageController::class, 'index'])->name('articles.index');
    Route::get('/articles/{article}', [PageController::class, 'show'])->name('articles.show');
    Route::get('/articles/create', [PageController::class, 'create'])->name('articles.create');
    Route::post('/articles', [PageController::class, 'store'])->name('articles.store');
    
    // Routes that use policies to check permissions
    Route::get('/articles/{article}/edit', [PageController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [PageController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [PageController::class, 'destroy'])->name('articles.destroy');
});

// Routes for reviewers and managers
Route::middleware(['auth', 'role:reviewer,manager'])->group(function () {
    Route::get('/review', function () {
        return view('review.dashboard');
    })->name('review.dashboard');
});

// Routes for managers only
Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // User management routes
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
});