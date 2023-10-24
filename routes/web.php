<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('auth.login');
    Route::post('login', 'attempt')->name('auth.attempt');
});

Route::prefix('dashboard')
    ->group(function () {
        Route::get('', [DashboardController::class, 'beranda'])->name('dashboard.beranda');

        Route::prefix('user')
            ->controller(UserController::class)
            ->group(function () {
                Route::get('', 'index')->name('dashboard.user.index');
                Route::get('buat', 'create')->name('dashboard.user.create');
                Route::post('', 'store')->name('dashboard.user.store');
                Route::get('{user}/ubah', 'edit')->name('dashboard.user.edit');
                Route::put('{user}', 'update')->name('dashboard.user.update');
                Route::delete('{user}', 'destroy')->name('dashboard.user.destroy');
            });
    });

    Route::get('dashboard/satuan', [SatuanController::class, 'halamanSatuan'])
    ->name('dashboard.satuan.halamanSatuan');

    Route::get('dashboard/satuan/tambah', [SatuanController::class, 'formTambah'])
    ->name('dashboard.satuan.form-tambah');
    Route::post('dashboard/satuan/tambah', [SatuanController::class, 'tambah'])
    ->name('dashboard.satuan.tambah');

    Route::get('dashboard/satuan/{id}/form-edit', [SatuanController::class, 'formEdit'])
    ->name('dashboard.satuan.form-edit');

    Route::put('dashboard/satuan/{id}/edit', [SatuanController::class, 'edit'])
    ->name('dashboard.satuan.edit');

    Route::post('dashboard/satuan/{id}/memulihkan', [SatuanController::class, 'memulihkan'])
    ->name('dashboard.satuan.memulihkan');

    Route::delete('dashboard/satuan/{id}/hapus', [SatuanController::class, 'hapus'])
    ->name('dashboard.satuan.hapus');


    Route::get('dashboard/barang', [BarangController::class, 'halamanBarang'])
    ->name('dashboard.barang.halamanBarang');
    
    Route::get('dashboard/barang/tambah', [BarangController::class, 'formTambah'])
    ->name('dashboard.barang.form-tambah');
    Route::post('dashboard/barang/tambah', [BarangController::class, 'tambah'])
    ->name('dashboard.barang.tambah');

    Route::get('dashboard/barang/{id}/form-edit', [BarangController::class, 'formEdit'])
    ->name('dashboard.barang.form-edit');
    Route::PUT('dashboard/barang/{id}/edit', [BarangController::class, 'edit'])
    ->name('dashboard.satuan.edit');
    