<?php

namespace Database\Seeders;

use App\Models\Car;
use Database\DbDefData;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < DbDefData::COUNT_CAR; $i++) {
            $modelId = random_int(1, count(DbDefData::MODELS)) - 1;

            Car::factory()
                ->setCarModel(DbDefData::MODELS[$modelId])
                ->create();
        }
    }
}
