<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < Car::DEF_COUNT; $i++) {
            $modelId = random_int(1, count(Car::DEF_MODELS)) - 1;

            Car::factory()
                ->setCarModel(Car::DEF_MODELS[$modelId])
                ->create();
        }
    }
}
