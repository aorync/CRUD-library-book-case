<?php

use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
// disini kita akan membuat route untuk menampilkan halaman
// route ini digunakan untuk menghubungkan Controller dengan View/tampilan page
// dan route ini akan terdapat pada url dari website, seperti -> https://1244.00/Register | Register disini adalah nama route nya
// seperti 'book' pada route ini

// saya akan mengganti LibraryController menjadi UserController, karena saya akan menggunakan middleware
// middleware untuk apa ? untuk menyimpan apakah user / pengguna sudah login sebelumnya atau belum, mirip seperti system cookies
// saya akan menambahkan route untuk menambahkna data buku ke db (database)
Route::post('tambah', [LibraryController::class, 'tambahBuku']);
Route::put('update/{id}', [LibraryController::class, 'updateBook']);
Route::get('edit/{id}', [LibraryController::class, 'edit']);
// membuat delete untuk menghapus data
Route::get('delete/{id}', [LibraryController::class, 'deleteBook']);
Route::get('login', [UserController::class, 'login'])->middleware('alreadyLogin');
Route::get('register', [UserController::class, 'register'])->middleware('alreadyLogin');
Route::get('login-user', [UserController::class, 'loginUser']);
Route::post('register-user', [UserController::class, 'registerUser']);
Route::get('logout', [UserController::class, 'logoutUser']);

Route::get('books', [UserController::class, 'index'])->middleware('authCheck');

Route::get('/', [LibraryController::class, 'welcome']);
// ini adalah route untuk tampilan pertama / home / dashboard
