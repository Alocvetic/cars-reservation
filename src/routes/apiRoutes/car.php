<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::prefix('car')->name('car.')->group(function () {
    Route::get('/', [CarController::class, 'index'])->name('index');
    Route::get('/{id}', [CarController::class, 'show'])->name('show');
    Route::post('/', [CarController::class, 'create'])->name('create');
    Route::put('/{id}', [CarController::class, 'update'])->name('update');
    Route::delete('/{id}', [CarController::class, 'delete'])->name('delete');
});
