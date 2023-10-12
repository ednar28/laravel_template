<?php

use App\Http\Controllers\DashboardController;
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
            });
    });
