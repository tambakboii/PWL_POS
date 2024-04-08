<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\levelController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;

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

// Route::get('/level',[levelController::class,'index']);
// Route::get('/kategori',[kategoriController::class,'index']);
// Route::get('/user',[UserController::class,'index']);
// Route::get('/user/tambah',[UserController::class,'tambah']);
// Route::get('/user/tambah_simpan',[UserController::class,'tambah_simpan']);
// Route::get('/user/ubah{id}',[UserController::class,'ubah']);
// Route::put('/user/tambah_simpan',[UserController::class,'ubah_simpan']);
// Route::get('/user/hapus/{id}',[UserController::class,'hapus']);
// Route::get('/kategori',[KategoriController::class,'index']);
// Route::get('/kategori/create',[KategoriController::class,'create']);
// Route::post('/kategori',[KategoriController::class,'store']);
// Route::get('/kategori/create',[KategoriController::class,'create'])->name('TambahKategori');
// Route::get('/kategori/edit/{id}',[kategoriController::class,'edit'])->name('EditKategori');
// Route::get('/kategori/update/{id}',[KategoriController::class,'update'])->name('UpdateKategori');
// Route::get('/kategori/delete/{id}',[kategoriController::class,'delete'])->name('DeleteKategori');


// Route::get('/',[WelcomeController::class,'index']);

// Route::group(['prefix'=>'user'], function(){
//     Route::get('/',[UserController::class,'index']);
//     Route::get('/list',[UserController::class,'list']);
//     Route::get('/create',[UserController::class,'create']);
//     // Route::get('/',[UserController::class,'store']);
//     Route::get('/{id}',[UserController::class,'show']);
//     Route::get('/{id}/edit',[UserController::class,'edit']);
//     Route::get('/{id}',[UserController::class,'update']);
//     Route::get('/{id}',[UserController::class,'destroy']);
// });

Route::get('/', [WelcomeController::class, 'index']);

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::resource('level', levelController::class);
Route::post('level/list', [levelController::class, 'list']);

Route::resource('kategori', kategoriController::class);
Route::post('kategori/list', [kategoriController::class, 'list']);

Route::resource('barang', barangController::class);
Route::post('barang/list', [barangController::class, 'list']);

Route::resource('stok', stokController::class);
Route::post('stok/list', [stokController::class, 'list']);

Route::resource('penjualan', TransaksiPenjualanController::class);
Route::post('penjualan/list', [TransaksiPenjualanController::class, 'list']);