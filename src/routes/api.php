<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

require_once 'Api/comfortCar.php';
require_once 'Api/driver.php';
require_once 'Api/position.php';
require_once 'Api/employee.php';
