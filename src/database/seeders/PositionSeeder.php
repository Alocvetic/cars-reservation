<?php

namespace Database\Seeders;

use App\Models\{ComfortCar, Position};
use App\Services\CollectionService;
use Database\DbDefData;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $comfortCars = ComfortCar::all()->pluck('id');

        for ($i = 0; $i < DbDefData::COUNT_POSITION; $i++) {
            $position = Position::factory()
                ->setTitle(DbDefData::POSITIONS[$i])
                ->create();

            $randomComfortCars = CollectionService::getRandom(
                collection: $comfortCars,
                count: random_int(1, DbDefData::COUNT_COMFORT)
            );

            $position->comfortCars()->sync($randomComfortCars);
        }
    }


}
