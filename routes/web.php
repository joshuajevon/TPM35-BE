<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
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

// bad practice
// Route::get('/', function () {
//     return view('welcome');
// });
// ctrl + /

// menampilkan page
Route::get('/', [BookController::class, 'show'])->name('show');

Route::get('/create', [BookController::class, 'create'])->name('create');

// untuk menyimpan data buku
Route::post('/store', [BookController::class, 'store'])->name('store');
// /produk -> nampilin produk
