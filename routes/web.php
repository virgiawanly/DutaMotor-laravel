<?php

use App\Http\Controllers\BeliCashController;
use App\Http\Controllers\KreditController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PembeliController;
use App\Models\Mobil;
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

Route::get('/', [PageController::class, 'dashboard']);

Route::get('/mobil/tambah-mobil', [MobilController::class, 'create']);
Route::resource('/mobil', MobilController::class)->except(['show']);

Route::get('/pembeli/register-pembeli', [PembeliController::class, 'create']);
Route::resource('/pembeli', PembeliController::class)->except(['show']);

Route::get('/transaksi/cash/beli-baru', [BeliCashController::class, 'create']);
Route::get('/transaksi/cash/{cash}/cetak-nota', [BeliCashController::class, 'cetak_nota'])->name('cash.cetak_nota');
Route::resource('/transaksi/cash', BeliCashController::class)->except(['show', 'edit', 'update', 'delete']);

Route::get('/transaksi/kredit/pendaftaran-kredit', [KreditController::class, 'create']);
// Route::get('/transaksi/kredit/{kredit}/cetak-nota', [KreditController::class, 'cetak_nota'])->name('cash.cetak_nota');
Route::resource('/transaksi/kredit', KreditController::class)->except(['create', 'store', 'show', 'edit', 'update', 'delete']);
