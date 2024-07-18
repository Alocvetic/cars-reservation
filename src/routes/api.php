<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

require_once 'apiRoutes/comfortCar.php';
require_once 'apiRoutes/driver.php';
require_once 'apiRoutes/position.php';
require_once 'apiRoutes/employee.php';
require_once 'apiRoutes/car.php';
require_once 'apiRoutes/booking.php';
