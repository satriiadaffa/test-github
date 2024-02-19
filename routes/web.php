<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\atkController;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\souvenirController;
use App\Http\Controllers\unitController;
use App\Http\Controllers\userController;
use App\Http\Controllers\kodeGLController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\transaksiController;


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


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login',[loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/submit-login',[loginController::class, 'submitLogin']);
Route::post('/logout', [loginController::class, 'logout']);

Route::get('/staticView', function () {
    return view('staticView');
});




Route::middleware(['auth'])->group(function () {

    Route::get('/beranda', [berandaController::class, 'index']);

    Route::get('/reset-season', [berandaController::class, 'reset']);

    Route::get('/tabel-atk', [atkController::class, 'showTabelAtk']);
    Route::get('/tabel-souvenir', [souvenirController::class, 'showTabelSouvenir']);
    Route::get('/tabel-unit', [unitController::class, 'showTabelUnit']);

    Route::get('/transaksi-atk-masuk', [transaksiController::class, 'indexTransaksiMasuk']);
    Route::get('/transaksi-atk-masuk-tambah-saldo', [transaksiController::class, 'indexTransaksiMasukTambahSaldo']);
    Route::get('/transaksi-atk-keluar', [transaksiController::class, 'indexRequest']);
    Route::get('/rekaman-penghapusan', [transaksiController::class, 'indexRekamanPenghapusan']);

    Route::get('/transaksi-souvenir-masuk', [transaksiController::class, 'indexTransaksiMasukSouvenir']);
    Route::get('/transaksi-souvenir-masuk-tambah-saldo', [transaksiController::class, 'indexTransaksiMasukTambahSaldoSouvenir']);
    Route::get('/transaksi-souvenir-keluar', [transaksiController::class, 'indexRequestSouvenir']);
    Route::get('/rekaman-penghapusan-souvenir', [transaksiController::class, 'indexRekamanPenghapusanSouvenir']);


    Route::get('/pendaftaran-atk', [atkController::class, 'index']);
    Route::post('/kirim-tambah-atk', [atkController::class, 'pendaftaranAtk']);
    Route::get('/tambah-saldo-atk/{kodeBarang}', [atkController::class, 'tambahSaldoATK']);
    Route::post('/kirim-tambah-saldo-atk/{kodeBarang}', [atkController::class, 'kirimTambahSaldoATK']);
    Route::get('/edit-atk/{kodeBarang}', [atkController::class, 'editATK']);
    Route::post('/kirim-edit-atk/{kodeBarang}', [atkController::class, 'kirimEditATK']);
    Route::get('/hapus-atk/{kodeBarang}', [atkController::class, 'hapusATK']);
    Route::get('/request-atk', [atkController::class, 'indexRequestAtk']);

    Route::get('/pendaftaran-souvenir', [souvenirController::class, 'index']);
    Route::post('/kirim-tambah-souvenir', [souvenirController::class, 'pendaftaranSouvenir']);
    Route::get('/tambah-saldo-souvenir/{kodeBarang}', [souvenirController::class, 'tambahSaldoSouvenir']);
    Route::post('/kirim-tambah-saldo-souvenir/{kodeBarang}', [souvenirController::class, 'kirimTambahSaldoSouvenir']);
    Route::get('/edit-souvenir/{kodeBarang}', [souvenirController::class, 'editSouvenir']);
    Route::post('/kirim-edit-souvenir/{kodeBarang}', [souvenirController::class, 'kirimEditSouvenir']);
    Route::get('/hapus-souvenir/{kodeBarang}', [souvenirController::class, 'hapusSouvenir']);
    Route::get('/request-souvenir', [souvenirController::class, 'indexRequestSouvenir']);

    Route::get('/get-nama-barang/{kodeGL}', [atkController::class, 'getNamaBarang']);
    Route::get('/get-saldo-barang/{namaBarang}', [atkController::class, 'getSaldoBarang']);
    Route::post('/kirim-request-atk', [atkController::class, 'requestAtk']);

    Route::get('/get-nama-barang-souvenir/{kodeGL}', [souvenirController::class, 'getNamaBarang']);
    Route::get('/get-saldo-barang-souvenir/{namaBarang}', [souvenirController::class, 'getSaldoBarang']);
    Route::post('/kirim-request-souvenir', [souvenirController::class, 'requestSouvenir']);

    Route::get('/edit-unit/{kodeUnit}', [unitController::class, 'editUnit']);
    Route::post('/kirim-edit-unit/{kodeUnit}', [unitController::class, 'kirimEditUnit']);
    Route::get('/hapus-unit/{kodeUnit}', [unitController::class, 'hapusUnit']);

    Route::get('/edit-user/{nip}', [userController::class, 'editUser']);
    Route::post('/kirim-edit-user/{nip}', [userController::class, 'kirimEditUser']);
    Route::get('/hapus-user/{nip}', [userController::class, 'hapusUser']);

    Route::get('/tambah-kode-gl', [kodeGLController::class, 'index']);
    Route::post('/kirim-tambah-kode-gl', [kodeGLController::class, 'tambahKodeGL']);

    Route::get('/tambah-unit', [unitController::class, 'index']);
    Route::post('/kirim-tambah-unit', [unitController::class, 'tambahUnit']);

    Route::middleware(['role:Super Admin'])->group(function () {
        Route::get('/manajemen-user', [userController::class, 'indexUsers']);
        Route::get('/tambah-user', [userController::class, 'tambahUser']);
        Route::post('/kirim-tambah-user', [userController::class, 'kirimTambahUser']);
    });

    Route::get('/laporan-atk', [atkController::class, 'tabelLaporanAtk']);


    Route::get('/laporan-souvenir', [souvenirController::class, 'tabelLaporanSouvenir']);

    Route::get('/account/edit/{nip}', [userController::class, 'accountEditIndex']);
    Route::post('/account/edit/kirim/{nip}', [userController::class, 'accountEditKirim']);
    Route::post('/account/hapus/{nip}', [userController::class, 'accountHapus']);
    
    
});





 // Route::middleware(['role:superAdmin'])->group(function () {
    //     Route::get('/manajemen-user', [userController::class, 'indexUsers']);
    //     Route::get('/tambah-user', [userController::class, 'tambahUser']);
    //     Route::post('/kirim-tambah-user', [userController::class, 'kirimTambahUser']);

    //     Route::get('/pendaftaran-atk', [atkController::class, 'index']);
    //     Route::post('/kirim-tambah-atk', [atkController::class, 'pendaftaranAtk']);
    //     Route::get('/tabel-atk', [atkController::class, 'showTabelAtk']);
    //     Route::get('/tambah-saldo-atk/{kodeBarang}', [atkController::class, 'tambahSaldoATK']);
    //     Route::post('/kirim-tambah-saldo-atk/{kodeBarang}', [atkController::class, 'kirimTambahSaldoATK']);
    //     Route::get('/edit-atk/{kodeBarang}', [atkController::class, 'editATK']);
    //     Route::post('/kirim-edit-atk/{kodeBarang}', [atkController::class, 'kirimEditATK']);
    //     Route::get('/hapus-atk/{kodeBarang}', [atkController::class, 'hapusATK']);
    //     Route::get('/request-atk', [atkController::class, 'indexRequestAtk']);
    //     Route::get('/get-nama-barang/{kodeGL}', [atkController::class, 'getNamaBarang']);
    //     Route::get('/get-saldo-barang/{namaBarang}', [atkController::class, 'getSaldoBarang']);
    //     Route::post('/kirim-request-atk', [atkController::class, 'requestAtk']);

    //     Route::get('/tambah-kode-gl', [kodeGLController::class, 'index']);
    //     Route::post('/kirim-tambah-kode-gl', [kodeGLController::class, 'tambahKodeGL']);
    
    //     Route::get('/tambah-unit', [unitController::class, 'index']);
    //     Route::post('/kirim-tambah-unit', [unitController::class, 'tambahUnit']);
    
    //     Route::get('/transaksi-atk-masuk', [transaksiController::class, 'indexTransaksiMasuk']);
    //     Route::get('/transaksi-atk-masuk-tambah-saldo', [transaksiController::class, 'indexTransaksiMasukTambahSaldo']);
    //     Route::get('/transaksi-atk-keluar', [transaksiController::class, 'indexRequest']);
    //     Route::get('/rekaman-penghapusan', [transaksiController::class, 'indexRekamanPenghapusan']);
        
    // });

    // Route::middleware(['role:manager'])->group(function () {
    //     Route::get('/tabel-atk', [atkController::class, 'showTabelAtk']);

    //     Route::get('/transaksi-atk-masuk', [transaksiController::class, 'indexTransaksiMasuk']);
    //     Route::get('/transaksi-atk-masuk-tambah-saldo', [transaksiController::class, 'indexTransaksiMasukTambahSaldo']);
    //     Route::get('/transaksi-atk-keluar', [transaksiController::class, 'indexRequest']);
    //     Route::get('/rekaman-penghapusan', [transaksiController::class, 'indexRekamanPenghapusan']);
        
    // });

    // Route::middleware(['role:staff'])->group(function () {
    //     Route::get('/pendaftaran-atk', [atkController::class, 'index']);
    //     Route::post('/kirim-tambah-atk', [atkController::class, 'pendaftaranAtk']);
    //     Route::get('/tabel-atk', [atkController::class, 'showTabelAtk']);
    //     Route::get('/tambah-saldo-atk/{kodeBarang}', [atkController::class, 'tambahSaldoATK']);
    //     Route::post('/kirim-tambah-saldo-atk/{kodeBarang}', [atkController::class, 'kirimTambahSaldoATK']);
    //     Route::get('/edit-atk/{kodeBarang}', [atkController::class, 'editATK']);
    //     Route::post('/kirim-edit-atk/{kodeBarang}', [atkController::class, 'kirimEditATK']);
    //     Route::get('/hapus-atk/{kodeBarang}', [atkController::class, 'hapusATK']);
    //     Route::get('/request-atk', [atkController::class, 'indexRequestAtk']);
    //     Route::get('/get-nama-barang/{kodeGL}', [atkController::class, 'getNamaBarang']);
    //     Route::get('/get-saldo-barang/{namaBarang}', [atkController::class, 'getSaldoBarang']);
    //     Route::post('/kirim-request-atk', [atkController::class, 'requestAtk']);

    //     Route::get('/tambah-kode-gl', [kodeGLController::class, 'index']);
    //     Route::post('/kirim-tambah-kode-gl', [kodeGLController::class, 'tambahKodeGL']);
    
    //     Route::get('/tambah-unit', [unitController::class, 'index']);
    //     Route::post('/kirim-tambah-unit', [unitController::class, 'tambahUnit']);
    
    //     Route::get('/transaksi-atk-masuk', [transaksiController::class, 'indexTransaksiMasuk']);
    //     Route::get('/transaksi-atk-masuk-tambah-saldo', [transaksiController::class, 'indexTransaksiMasukTambahSaldo']);
    //     Route::get('/transaksi-atk-keluar', [transaksiController::class, 'indexRequest']);
    //     Route::get('/rekaman-penghapusan', [transaksiController::class, 'indexRekamanPenghapusan']);
        
    // });

    







