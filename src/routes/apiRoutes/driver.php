<?php

use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Route;

Route::prefix('driver')->name('driver.')->group(function () {
    Route::get('/', [DriverController::class, 'index'])->name('index');
    Route::get('/{id}', [DriverController::class, 'show'])->name('show');

    Route::post('/', [DriverController::class, 'create'])->name('create');

    Route::patch('/{id}', [DriverController::class, 'update'])->name('update');

    Route::delete('/{id}', [DriverController::class, 'delete'])->name('delete');
});
