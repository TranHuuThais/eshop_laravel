<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return ('welcome');
});




Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::resource('orderItems', OrderItemController::class);





route::get('child', function(){
    return view('child');
});

route::group(['prefix' => 'admin'], function(){
    route::resource('users', App\Http\Controllers\Admin\UserController::class, ['names' =>'Admin.users']);
    route::resource('products', App\Http\Controllers\Admin\ProductController::class,['names'=>'Admin.products']);
});
// route::get('/search', [ProductController::class, 'search'])->name('products.search');


