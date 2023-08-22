<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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


Auth::routes();
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/activate/{code}', [ActivationController::class,'activateUserAccount'])->name('user.activate');
Route::get('/resend/{email}', [ActivationController::class,'resendActivationCode'])->name('code.resend');

Route::resource('products', 'App\Http\Controllers\ProductController');
Route::get('/all_products',[ProductController::class, 'index'])->name('All_products');

Route::get('products/category/{category}', [HomeController::class,'getProductByCategory'])->name("category.products");
// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add/cart/{product}', [CartController::class, 'addProductToCart'])->name('add.cart');
Route::get('/add/cart/{product}', [CartController::class, 'addProductToCartHome'])->name('add.cart.home');
Route::delete('/remove/{product}/cart', [CartController::class, 'removeProductFromCart'])->name('remove.cart');
Route::put('/update/{product}/cart', [CartController::class, 'updateProductOnCart'])->name('update.cart');
