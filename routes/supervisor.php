<?php

use App\Http\Controllers\Supervisor\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Supervisor\DemandController;
use App\Http\Controllers\Supervisor\GasController;
use App\Http\Controllers\Supervisor\RequestGasController;
use App\Http\Controllers\Supervisor\SendingGasController;
use App\Http\Controllers\Supervisor\LoginSupervisorController;

Route::middleware(['guest:supervisor', 'PreventBackHistory'])->group(function () {
    Route::view('/', 'Supervisor.login')->name('login');
    Route::post('/', [LoginSupervisorController::class, 'authenticate'])->name('check-login');
});

Route::middleware(['auth:supervisor', 'PreventBackHistory'])->group(function () {
    Route::post('/logout', [LoginSupervisorController::class, 'logout'])->name('logout');
    Route::controller(GasController::class)
        ->group(function () {
            Route::get('/pengajuan-gas', 'pengajuan')->name('gas.pengajuan');
            Route::get('/pengiriman-gas', 'index')->name('sending.index');
            Route::get('/gas', 'gas')->name('gas');
        });

    Route::get('/pelanggan', CustomerController::class)->name('pelanggan');
});
