<?php

use App\Http\Controllers\RSCM\DemandController;
use App\Http\Controllers\RSCM\LoginRSCMController;
use Illuminate\Support\Facades\Route;



Route::middleware(['guest:rscm', 'PreventBackHistory'])->group(function () {
    Route::view('/', 'RSCM.login')->name('login');
    Route::post('/', [LoginRSCMController::class, 'authenticate'])->name('check-login');
});

Route::middleware(['auth:rscm', 'PreventBackHistory'])->group(function () {
    Route::post('/logout', [LoginRSCMController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        return 'test';
    })->name('home');

    Route::controller(DemandController::class)
        ->group(function () {
            Route::get('/history-gas', 'index')->name('demand.index');
            Route::get('/request-gas', 'indexRequest')->name('demand.request');
            Route::get('/request-gas/approv', 'approv')->name('demand.approv');
            // Route::post('/request-gas', 'store')->name('demand.store');
            // Route::delete('/request-gas', 'delete')->name('demand.delete');
        });
});
    
    // });