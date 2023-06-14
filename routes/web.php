<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/activer/{code}', [App\Http\Controllers\ActiveController::class, 'activeAccount'])->name('user.activer');
Route::get('/resend/{email}', [App\Http\Controllers\ActiveController::class, 'resendCode'])->name('resend.code');
Route::resource('products', ProductController::class);
Route::get('products/category/{category}', [App\Http\Controllers\HomeController::class, 'getProductByCategory'])->name('category.products');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/add/cart/{product}', [App\Http\Controllers\CartController::class, 'addProductToCart'])->name('add.cart');
Route::put('/update/{product}/cart', [App\Http\Controllers\CartController::class, 'updateProductToCart'])->name('update.cart');
Route::delete('/remove/{product}/cart', [App\Http\Controllers\CartController::class, 'removeProductToCart'])->name('remove.cart');




