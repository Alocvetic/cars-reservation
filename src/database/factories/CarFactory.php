<?php

namespace Database\Factories;

use Database\DbDefData;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected string $carModel;

    public function setCarModel(string $carModel): static
    {
        $this->carModel = $carModel;

        return $this;
    }

    public function definition(): array
    {
        return [
            'register_number' => fake()->unique()->regexify('[A-Z]{1}[0-9]{3}[A-Z]{2}'),
            'model' => $this->carModel,
            'comfort_car_id' => random_int(1, DbDefData::COUNT_COMFORT),
            'driver_id' => random_int(1, DbDefData::COUNT_DRIVER),
        ];
    }
}
