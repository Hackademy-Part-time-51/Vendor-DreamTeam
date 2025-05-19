<?php
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ProductOwner;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

Route::get('/',[PageController::class,'home'] )->name('home');

Route::controller(PageController::class)->group(function () {
    Route::get('/products/index','index')->name('products.index');
    Route::get('/products/create','create')->name('products.create')->middleware('verified');
    Route::get('/products/{product}','show')->name('products.show')->middleware('verified');
    Route::get('/products/{product}/edit','edit')->name('products.edit')->middleware(['verified']);
    Route::post('/products','store')->name('products.store')->middleware('verified');
    Route::put('/products/{product}','update')->name('products.update')->middleware('verified');
    Route::delete('/products/{product}','destroy')->name('products.destroy')->middleware('verified');
    Route::get('/FAQ','faq')->name('faq');
    Route::get('/privacy','privacy')->name('privacy');
    Route::get('/terms','terms')->name('terms');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/areapersonale/{id}', 'personalArea')->name('personalArea')->middleware('verified');
    Route::get('/lavoraConNoi', 'lavoraConNoi')->name('lavoraConNoi')->middleware('auth');
    Route::get('/messaggi/{id?}/{user?}', 'messaggi')->name('messaggi')->middleware('auth');
});

Route::controller(RevisorController::class)->group(function(){
    Route::get('/revisor/index',  'index')->name('revisor.index');
    Route::post('/revisor/request',  'becomeRevisor')->middleware('auth')->name('become.revisor');
    Route::get('/revisor/index',  'index')->middleware('isRevisor')->name('revisor.index');
    Route::patch('/accept/{product}',  'accept')->name('accept');
    Route::patch('/reject/{product}',  'reject')->name('reject');
    Route::get('/revisor/request',  'becomeRevisor')->middleware('auth')->name('become.revisor');  
    Route::get('/make/revisor/{user}',  'makeRevisor')->name('make.revisor');
});


Route::get('/comuni-json', function () {
    $json = Storage::disk('public')->get('comuni.json');
    $comuni=json_decode($json);
    return $comuni;
});

// rotta per cambio lingua

Route::post('/lingua/{lang}',[PageController::class, 'setLanguage'])->name('setLocale');




Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);



