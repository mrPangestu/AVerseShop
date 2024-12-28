<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

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

Route::get('/', [MainController::class, 'showMain'])->name('main');
Route::get('/tentang', [MainController::class, 'showAbout'])->name('about');
Route::get('/kontak', [MainController::class, 'showContact'])->name('Contact');



Route::middleware(['auth'])->group(function () {
    Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
    Route::post('/keranjang', [CartController::class, 'store'])->name('cart.store');
    Route::put('/keranjang/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/keranjang/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/produk/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/keranjang/delete', [CartController::class, 'deleteCartItem'])->name('cart.delete');
    Route::post('/keranjang/update/{cartId}', [CartController::class, 'updateCartQuantity'])->name('cart.update');
    

});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/produk', [ProductController::class, 'showProduct'])->name('product');
Route::resource('products', ProductController::class);

