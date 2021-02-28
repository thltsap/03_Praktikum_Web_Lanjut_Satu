<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 1. Halaman Home (Route Biasa)
Route::get('/', [HomeController::class, 'index'])->name('home');

//2. Halaman Produk (Route Prefix)
Route::prefix('/product')->group(function(){
   Route::get('/produk', [ProductController::class, 'index'])->name('product');
});

//3. Halaman News (Route Parameter)
Route::get('/news/{title}', [NewsController::class, 'index'])->name('news');

// 4. Halaman About-us (Route Biasa)
Route::get('/about-us', [AboutController::class, 'index'])->name('about');

// 5. Halaman Contact-us (Route Resource only)
Route::resource('/contact-us', ContactController::class, [
   'only' => ['index']
]);