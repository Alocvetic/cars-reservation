<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::prefix('employee')->name('employee.')->group(function () {
    // READ
    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/{id}', [EmployeeController::class, 'show'])->name('show');

    // CREATE
    Route::post('/', [EmployeeController::class, 'create'])->name('create');

    // UPDATE
    Route::patch('/{id}', [EmployeeController::class, 'update'])->name('update');

    // DELETE
    Route::delete('/{id}', [EmployeeController::class, 'delete'])->name('delete');
});
