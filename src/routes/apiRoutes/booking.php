<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::prefix('booking')->name('booking.')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::get('/{id}', [BookingController::class, 'show'])->name('show');

    Route::post('/', [BookingController::class, 'create'])->name('create');

    Route::patch('/{id}', [BookingController::class, 'update'])->name('update');

    Route::delete('/{id}', [BookingController::class, 'delete'])->name('delete');
});
