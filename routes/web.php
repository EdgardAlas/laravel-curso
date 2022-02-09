<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [MainController::class, "index"])->name("main")->middleware("auth");
Route::resource("products", ProductController::class)->middleware(["auth"]);
Route::resource("products.carts", ProductCartController::class)->middleware(["auth"])->only(["store", "destroy"]);
Route::resource("carts", CartController::class)->middleware(["auth"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
