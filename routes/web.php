<?php

use App\Models\Keranjang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembayaranController;

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

// Route::get('/', function () {
//     return view('login');
// });
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/proses_login', [LoginController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::get('tambah-user', [UserController::class, 'tambah'])->name('tambah');
    Route::get('lihat-user/{id}', [UserController::class, 'lihat_user'])->name('lihat_user');
    Route::get('edit-user/{id}', [UserController::class, 'edit'])->name('edit_user');
    Route::post('user/proses-tambah-user', [UserController::class, 'tambah_user'])->name('proses-tambah-user');
    Route::put('user/proses-edit-user/{id}', [UserController::class, 'edit_user'])->name('proses-edit-user');
    Route::get('hapus-user/{id}', [UserController::class, 'hapus'])->name('hapus');

    // KATEGORI
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('kategori/tambah-kategori', [KategoriController::class, 'tambah'])->name('tambah-kategori');
    Route::post('kategori/proses-tambah-kategori', [KategoriController::class, 'proses_tambah_kategori'])->name('proses-tambah-kategori');
    Route::get('lihat-kategori/{id}', [KategoriController::class, 'lihat_kategori'])->name('lihat_kategori');
    Route::put('kategori/proses-edit-kategori/{id}', [KategoriController::class, 'edit_kategori'])->name('proses-edit-kategori');
    Route::get('hapus-kategori/{id}', [KategoriController::class, 'hapus'])->name('hapus');

    // Barang
    Route::get('barang', [BarangController::class, 'index'])->name('barang');
    Route::get('barang/tambah-barang', [BarangController::class, 'tambah'])->name('tambah-barang');
    Route::get('lihat-barang/{id}', [BarangController::class, 'lihat_barang'])->name('lihat_barang');
    Route::post('barang/proses-tambah-barang', [BarangController::class, 'proses_tambah_barang'])->name('proses-tambah-barang');
    Route::put('barang/proses-edit-barang/{id}', [BarangController::class, 'edit_barang'])->name('proses-edit-barang');
    Route::get('hapus-barang/{id}', [BarangController::class, 'hapus'])->name('hapus');

    //keranjang
    Route::get('keranjang', [KeranjangController::class, 'index'])->name('keranjang');
    Route::post('keranjang/proses-transaksi', [KeranjangController::class, 'proses_transaksi'])->name('proses-transaksi');
    Route::post('keranjang/proses-pembayaran/', [KeranjangController::class, 'proses_bayar'])->name('proses-pembayaran');
    Route::get('/barang/harga_barang/{id} ', [KeranjangController::class, 'autofill']);
    Route::get('/barang/nama_barang/{id} ', [KeranjangController::class, 'autofill']);

    // pembayaran
    Route::post('pembayaran/proses-transaksi', [PembayaranController::class, 'proses_transaksi'])->name('proses-transaksi');
});