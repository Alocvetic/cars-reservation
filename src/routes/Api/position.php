<?php

use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::prefix('position')->name('position.')->group(function () {
    // READ
    Route::get('/', [PositionController::class, 'index'])->name('index');
    Route::get('/{id}', [PositionController::class, 'show'])->name('show');

    // CREATE
    Route::post('/', [PositionController::class, 'create'])->name('create');

    // UPDATE
    Route::patch('/{id}', [PositionController::class, 'update'])->name('update');

    // DELETE
    Route::delete('/{id}', [PositionController::class, 'delete'])->name('delete');
});
