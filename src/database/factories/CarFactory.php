<?php

namespace Database\Factories;

use App\Models\ComfortCar;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    public function definition(): array
    {
        return [
            'register_number' => fake()->unique()->regexify('[A-Z]{1}[0-9]{3}[A-Z]{2}'),
            'model' => fake()->text(30),
            'comfort_car_id' => random_int(1, ComfortCar::COUNT_FACTORY),
            'driver_id' => random_int(1, Driver::COUNT_FACTORY),
        ];
    }
}
