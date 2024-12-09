<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/tentang', [MainController::class, 'showAbout'])->name('about');
Route::get('/', [MainController::class, 'showMain'])->name('main');
Route::get('/produk', [MainController::class, 'showProduct'])->name('product');
Route::get('/kontak', [MainController::class, 'showContact'])->name('Contact');