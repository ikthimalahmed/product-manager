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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/profile', 'App\Http\Controllers\DashboardController@profile')->name('dashboard.profile');
    Route::get('/dashboard/purchase', 'App\Http\Controllers\PurchaseProductsController@index')->name('dashboard.purchase');
    Route::resource('purchases', App\Http\Controllers\PurchaseProductsController::class);
    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');
});

Route::group(['middleware' => ['auth', 'role:admin']], function() { 
    Route::get('/dashboard/products', 'App\Http\Controllers\ProductController@index')->name('dashboard.products');
    Route::resource('products', App\Http\Controllers\ProductController::class);

});

Route::get('/search/{query}', 'App\Http\Controllers\PurchaseProductsController@search');
Route::get('/exportexcel', [ App\Http\Controllers\ProductController::class, 'exportexcel'])->name('exportexcel');




require __DIR__.'/auth.php';
