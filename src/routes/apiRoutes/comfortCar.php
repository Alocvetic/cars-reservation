<?php

use App\Http\Controllers\ComfortCarController;
use Illuminate\Support\Facades\Route;

Route::prefix('comfortCar')->name('comfortCar.')->group(function () {
    Route::get('/', [ComfortCarController::class, 'index'])->name('index');
    Route::get('/{id}', [ComfortCarController::class, 'show'])->name('show');

    Route::post('/', [ComfortCarController::class, 'create'])->name('create');

    Route::patch('/{id}', [ComfortCarController::class, 'update'])->name('update');

    Route::delete('/{id}', [ComfortCarController::class, 'delete'])->name('delete');
});
