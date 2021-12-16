<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/profile', 'App\Http\Controllers\DashboardController@profile')->name('dashboard.profile');
    Route::get('/dashboard/cart', 'App\Http\Controllers\CartController@index')->name('dashboard.cart');
    Route::get('/dashboard/purchase', 'App\Http\Controllers\PurchaseController@index')->name('dashboard.purchase');
    Route::resource('cart', App\Http\Controllers\CartController::class);
    Route::resource('purchase', App\Http\Controllers\PurchaseController::class);
    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::group(['middleware' => ['auth', 'role:admin']], function() { 
    Route::get('/dashboard/products', 'App\Http\Controllers\ProductController@index')->name('dashboard.products');
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::get('/product/pdf','ProductController@createPDF');

});

Route::get('/search/{query}', 'App\Http\Controllers\CartController@search');




require __DIR__.'/auth.php';
