<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Customer\OtherController;
use App\Http\Controllers\Customer\IuranCustomerController;
use App\Http\Controllers\Customer\LoginCustomerController;
use App\Http\Controllers\Customer\SuratCustomerController;
use App\Http\Controllers\Customer\ProfileCustomerController;
use App\Http\Controllers\Customer\KegiatanCustomerController;
use App\Http\Controllers\Customer\DashboardCustomerController;
use App\Http\Controllers\Customer\FasilitasCustomerController;
use App\Http\Controllers\Customer\PengumumanCustomerController;
use App\Http\Controllers\Customer\PengaduanController as CustomerPengaduanController;
use App\Http\Controllers\Customer\DemandController;

// Route::prefix('Customer')->name('warga.')->group(function () {
Route::middleware(['guest', 'PreventBackHistory'])->group(function () {
    // Route::view('/', 'Customer.login-warga ');
    Route::post('/', [LoginCustomerController::class, 'authenticate'])->name('check-login');
});


Route::middleware(['auth', 'PreventBackHistory'])->group(function () {
    Route::post('/logout', [LoginCustomerController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [TransactionController::class, 'index'])->name('home');

    Route::controller(DemandController::class)
        ->group(function () {
            Route::get('/history-gas', 'index')->name('demand.index');
            Route::get('/request-gas', 'create')->name('demand.create');
            Route::post('/request-gas', 'store')->name('demand.store');
            Route::delete('/request-gas', 'delete')->name('demand.delete');
        });
});
