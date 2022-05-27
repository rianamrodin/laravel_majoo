<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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

Route::get('/', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

require __DIR__ . '/auth.php';


Route::resource('/master/supplier', SupplierController::class)->middleware('auth');
Route::resource('/master/user', UserController::class)->middleware('auth');
Route::resource('/master/pelanggan', PelangganController::class)->middleware('auth');
Route::resource('/master/product', ProductController::class)->middleware('auth');
Route::resource('/master/productcategories', ProductCategoryController::class)->middleware('auth');
