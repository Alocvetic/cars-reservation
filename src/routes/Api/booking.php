<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::prefix('booking')->name('booking.')->group(function () {
    // READ
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::get('/{id}', [BookingController::class, 'show'])->name('show');

    // CREATE
    Route::post('/', [BookingController::class, 'create'])->name('create');

    // UPDATE
    Route::patch('/{id}', [BookingController::class, 'update'])->name('update');

    // DELETE
    Route::delete('/{id}', [BookingController::class, 'delete'])->name('delete');
});
