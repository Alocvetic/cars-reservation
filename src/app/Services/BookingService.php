<?php

declare(strict_types=1);

namespace App\Services;

use Database\DbDefData;

class BookingService
{
    public static function getDefList(): array
    {
        $countCars = DbDefData::COUNT_CAR;
        $countEmployees = DbDefData::COUNT_EMPLOYEE;
        $now = now();

        return [
            [
                'car_id' => random_int(1, $countCars),
                'employee_id' => random_int(1, $countEmployees),
                'book_from' => $now->clone()->addDay(),
                'book_to' => $now->clone()->addDays(2),
            ],
            [
                'car_id' => random_int(1, $countCars),
                'employee_id' => random_int(1, $countEmployees),
                'book_from' => $now->clone()->addHours(4),
                'book_to' => $now->clone()->addHours(8),
            ],
            [
                'car_id' => random_int(1, $countCars),
                'employee_id' => random_int(1, $countEmployees),
                'book_from' => $now->clone()->subDays(2),
                'book_to' => $now->clone()->subDay(),
            ],
            [
                'car_id' => random_int(1, $countCars),
                'employee_id' => random_int(1, $countEmployees),
                'book_from' => $now->clone()->subHours(8),
                'book_to' => $now->clone()->subHours(4),
            ],
            [
                'car_id' => random_int(1, $countCars),
                'employee_id' => random_int(1, $countEmployees),
                'book_from' => $now->clone()->subDay(),
                'book_to' => $now->clone()->addDay(),
            ],
            [
                'car_id' => random_int(1, $countCars),
                'employee_id' => random_int(1, $countEmployees),
                'book_from' => $now->clone()->subHours(4),
                'book_to' => $now->clone()->addHours(4),
            ]
        ];
    }
}
