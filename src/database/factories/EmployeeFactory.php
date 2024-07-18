<?php

namespace Database\Factories;

use Database\DbDefData;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->name,
            'position_id' => random_int(1, DbDefData::COUNT_POSITION)
        ];
    }
}
