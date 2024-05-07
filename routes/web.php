<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryShowController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::resource('orderItems', OrderItemController::class);
 
Route::resource('home', HomeController::class);
Route::get('/search', 'App\Http\Controllers\SearchController@index')->name('home.search');
// Route::get('/categories/{id}',  [CategoryController::class, 'showById'])->name('home.showCategory');
// Route::get('/categories/{id}',  [CategoryController::class, 'showById'])->name('home.showCategory');
Route::get('/categories/{category_id}', [CategoryShowController::class, 'index'])->name('home.showCategory');






route::group(['prefix' => 'admin'], function(){
    route::resource('users', App\Http\Controllers\Admin\UserController::class, ['names' =>'Admin.users']);
    route::resource('products', App\Http\Controllers\Admin\ProductController::class,['names'=>'Admin.products']);
    route::resource('orders', App\Http\Controllers\Admin\OrderController::class,['names'=>'Admin.orders']);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

