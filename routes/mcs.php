<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MCS\DemandController;

use App\Http\Controllers\MCS\LoginMCSController;
use App\Http\Controllers\MCS\SendingGasController;

Route::middleware(['guest:mcs', 'PreventBackHistory'])->group(function () {
    Route::view('/', 'mcs.login')->name('login');
    Route::post('/', [LoginMCSController::class, 'authenticate'])->name('check-login');
});

Route::middleware(['auth:mcs', 'PreventBackHistory'])->group(function () {
    Route::post('/logout', [LoginMCSController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        return 'test';
    })->name('home');

    Route::controller(DemandController::class)
        ->group(function () {
            Route::get('/history-gas', 'index')->name('demand.index');
            Route::get('/request-gas', 'indexRequest')->name('demand.request');
            Route::post('/request-gas/approv', 'approv')->name('demand.approv');
            // Route::post('/request-gas', 'store')->name('demand.store');
            // Route::delete('/request-gas', 'delete')->name('demand.delete');
        });
    Route::get('sending-gas', SendingGasController::class)->name('sending.gas');
});
    
    // });