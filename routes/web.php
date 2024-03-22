<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\levelController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\UserController;

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

Route::get('/level',[levelController::class,'index']);
Route::get('/kategori',[kategoriController::class,'index']);
Route::get('/user',[UserController::class,'index']);
Route::get('/user/tambah',[UserController::class,'tambah']);
Route::get('/user/tambah_simpan',[UserController::class,'tambah_simpan']);
Route::get('/user/ubah{id}',[UserController::class,'ubah']);
Route::put('/user/tambah_simpan',[UserController::class,'ubah_simpan']);
Route::get('/user/hapus/{id}',[UserController::class,'hapus']);
Route::get('/kategori',[KategoriController::class,'index']);
Route::get('/kategori/create',[KategoriController::class,'create']);
Route::post('/kategori',[KategoriController::class,'store']);
Route::get('/kategori/create',[KategoriController::class,'create'])->name('TambahKategori');
Route::get('/kategori/edit/{id}',[kategoriController::class,'edit'])->name('EditKategori');
Route::get('/kategori/update/{id}',[KategoriController::class,'update'])->name('UpdateKategori');
Route::get('/kategori/delete/{id}',[kategoriController::class,'delete'])->name('DeleteKategori');
