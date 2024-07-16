<?php

use App\Http\Controllers\ComfortCarController;
use Illuminate\Support\Facades\Route;

Route::prefix('comfortCar')->name('comfortCar.')->group(function () {
    // READ
    Route::get('/', [ComfortCarController::class, 'index'])->name('index');
    Route::get('/{id}', [ComfortCarController::class, 'show'])->name('show');

    // CREATE
    Route::post('/', [ComfortCarController::class, 'create'])->name('create');

    // UPDATE
    Route::patch('/{id}', [ComfortCarController::class, 'update'])->name('update');

    // DELETE
    Route::delete('/{id}', [ComfortCarController::class, 'delete'])->name('delete');
});
