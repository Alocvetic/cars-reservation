<?php

use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::prefix('position')->name('position.')->group(function () {
    Route::get('/', [PositionController::class, 'index'])->name('index');
    Route::get('/{id}', [PositionController::class, 'show'])->name('show');
    Route::post('/', [PositionController::class, 'create'])->name('create');
    Route::put('/{id}', [PositionController::class, 'update'])->name('update');
    Route::delete('/{id}', [PositionController::class, 'delete'])->name('delete');
});
