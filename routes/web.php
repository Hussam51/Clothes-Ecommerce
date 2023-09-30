<?php

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OrderController;
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

Route::get('/',[HomeController::class,'index']);
Route::get('/{category}/Products',[HomeController::class,'categoryProducts'])->name('front.category.products');

Route::resource('/cart',CartController::class);
Route::get('/checkout',[OrderController::class,'create'])->name('checkout');
Route::post('/checkout',[OrderController::class,'store'])->name('checkout');
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
