<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserSearch\UserSearchPageController;
use App\Http\Controllers\UserSearch\FindController;
use App\Http\Controllers\Orders\CreateOrderController;
use \App\Http\Controllers\Orders\OrdersController;
use \App\Http\Controllers\Orders\OrderController;

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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', UserSearchPageController::class)->name('user_search.index');
Route::post('/', FindController::class)->name('user_search.find');
Route::get('/order/list', OrdersController::class)->name('orders.list');
Route::post('/order', CreateOrderController::class)->name('orders.create');
Route::get('/order/{id}', OrderController::class)->name('orders.order');
