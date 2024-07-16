<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::prefix('car')->name('car.')->group(function () {
    // READ
    Route::get('/', [CarController::class, 'index'])->name('index');
    Route::get('/{id}', [CarController::class, 'show'])->name('show');

    // CREATE
    Route::post('/', [CarController::class, 'create'])->name('create');

    // UPDATE
    Route::patch('/{id}', [CarController::class, 'update'])->name('update');

    // DELETE
    Route::delete('/{id}', [CarController::class, 'delete'])->name('delete');
});
