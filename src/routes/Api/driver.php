<?php

use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Route;

Route::prefix('driver')->name('driver.')->group(function () {
    // READ
    Route::get('/', [DriverController::class, 'index'])->name('index');
    Route::get('/{id}', [DriverController::class, 'show'])->name('show');

    // CREATE
    Route::post('/', [DriverController::class, 'create'])->name('create');

    // UPDATE
    Route::patch('/{id}', [DriverController::class, 'update'])->name('update');

    // DELETE
    Route::delete('/{id}', [DriverController::class, 'delete'])->name('delete');
});
