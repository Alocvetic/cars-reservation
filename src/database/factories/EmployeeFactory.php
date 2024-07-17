<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->name,
            'position_id' => random_int(1, Position::DEF_COUNT)
        ];
    }
}
