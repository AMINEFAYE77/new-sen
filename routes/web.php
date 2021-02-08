<?php

use App\Http\Controllers\AppelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/product/search', [App\Http\Controllers\ProductController::class, 'search'])->name('search_product');
    Route::get('admin/product/allproducts', [App\Http\Controllers\ProductController::class, 'allProduct'])->name('allproducts');
    Route::get('admin/product/showFromNotifications/{product}/{notifications}', [App\Http\Controllers\ProductController::class, 'showFromNotifications'])->name('showFromNotifications');
    Route::get('admin/appel/search', [App\Http\Controllers\AppelController::class, 'search'])->name('search_appel');
    Route::get('admin/settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('settings');
    Route::match(['get','post'],'admin/update-password', [App\Http\Controllers\AdminController::class, 'settings'])->name('update-password');
    //Route::post('/add-product', [App\Http\Controllers\AdminController::class, 'addProduct'])->name('addProduct');

    Route::resource('products', ProductController::class);

    Route::put('products/{id}/validate', [ProductController::class,'validationproduit'])->name('products.validate');

    Route::resource('appels', AppelController::class);
    Route::resource('/admin/users', UsersController::class)->middleware('can:managers-users');
});

