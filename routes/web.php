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
    return view('welcome');
});

route::get('/home', function () {
    return 'hello word';
})->middleware('CheckAge');
route::get('/shop', function () {
    return 'hello shop';
});
Route::get('/about', function () {
    return 'hello about';
});
route::get('/contact', function () {
    return 'hello contact';
});


Route::post('/post', function () {
    echo ' method post';
});
Route::put('/put', function () {
    return route('home');
});


route::get('post/{post}/comments/{comments}', function ($postId, $commentId) {
    return "postId:$postId - commentsId: $commentId";
});
route::get('user/{name?}', function ($name = 'Joh') {
    return $name;
});


Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::resource('orderItems', OrderItemController::class);


route::get('child', function(){
    return view('child');
});

route::group(['prefix' => 'Admin'], function(){
    route::resource('users', App\Http\Controllers\Admin\UserController::class, ['names' =>'Admin.users.index']);
});


