<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Medco\DemandController;
use App\Http\Controllers\Medco\GasController;
use App\Http\Controllers\Medco\RequestGasController;
use App\Http\Controllers\Medco\SendingGasController;
use App\Http\Controllers\Medco\LoginMedcoController;

Route::middleware(['guest:medco', 'PreventBackHistory'])->group(function () {
    Route::view('/', 'Medco.login')->name('login');
    Route::post('/', [LoginMedcoController::class, 'authenticate'])->name('check-login');
});

Route::middleware(['auth:medco', 'PreventBackHistory'])->group(function () {
    Route::post('/logout', [LoginMedcoController::class, 'logout'])->name('logout');
    Route::controller(GasController::class)
        ->group(function () {
            Route::get('/permintaan-gas', 'index')->name('approv.index');
            Route::get('/permintaan-gas/{gas}', 'approv')->name('approv.create');
        });
});
