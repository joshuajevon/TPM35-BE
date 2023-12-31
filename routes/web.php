<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
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

// bad practice
// Route::get('/', function () {
//     return view('welcome');
// });
// ctrl + /

// menampilkan page
Route::get('/', [BookController::class, 'show'])->name('show');

Route::post('/send-mail', [MailController::class, 'sendMail'])->name('sendMail');

Route::middleware('isAdmin')->group(function(){

    //jenis route grouping prefix
    // Route::prefix('/admin')->group(function(){
    //     Route::get('/create', [BookController::class, 'create'])->name('create');

    //     // untuk menyimpan data buku
    //     Route::post('/store', [BookController::class, 'store'])->name('store');
    //     // /produk -> nampilin produk

    //     Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit');

    //     Route::patch('/update/{id}', [BookController::class, 'update'])->name('update');
    //     // ctrl + d

    //     Route::delete('/delete/{id}', [BookController::class, 'delete'])->name('delete');
    // });

    // jenis route grouping controller

    Route::controller(BookController::class)->group(function () {
        Route::get('/create', 'create')->name('create');

        // untuk menyimpan data buku
        Route::post('/store', 'store')->name('store');
        // /produk -> nampilin produk

        Route::get('/edit/{id}', 'edit')->name('edit');

        Route::patch('/update/{id}', 'update')->name('update');
        // ctrl + d

        Route::delete('/delete/{id}', 'delete')->name('delete');
    });


});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
