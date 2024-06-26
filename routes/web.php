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
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


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

Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::resource('orderItems', OrderItemController::class);
 
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/search', 'App\Http\Controllers\SearchController@index')->name('home.search');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
// Route::get('/categories/{id}',  [CategoryController::class, 'showById'])->name('home.showCategory');
// Route::get('/categories/{id}',  [CategoryController::class, 'showById'])->name('home.showCategory');
Route::get('/categories/{category_id}', [CategoryShowController::class, 'index'])->name('home.category');
Route::get('/products/search', 'ProductController@search')->name('products.search');

// addToCart
Route::get('show-cart', [CartController::class, 'index'])->name('cart.index');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.delete');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/item_count', 'CartController@getItemCount')->name('cart.item_count');

// Checkout routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('home.checkout');
Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('home', App\Http\Controllers\Admin\HomeController::class, ['names' =>'Admin.home']);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class, ['names' =>'Admin.users']);
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class,['names'=>'Admin.products']);
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class,['names'=>'Admin.orders']);
    Route::resource('orderItems', App\Http\Controllers\Admin\OrderItemController::class,['names'=>'Admin.orderItems']);
    Route::resource('categories', App\Http\Controllers\admin\CategoryController::class, ['names' => 'Admin.categories']);
});
// route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('Admin.home');

Route::middleware('auth')->get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('Admin.home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

