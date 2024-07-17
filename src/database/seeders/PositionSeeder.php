<?php

namespace Database\Seeders;

use App\Models\{ComfortCar, Position};
use App\Services\CollectionService;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $comfortCars = ComfortCar::all()->pluck('id');

        for ($i = 0; $i < Position::DEF_COUNT; $i++) {
            $position = Position::factory()
                ->setTitle(Position::DEF_VALUES[$i])
                ->create();

            $randomComfortCars = CollectionService::getRandom(
                collection: $comfortCars,
                count: random_int(1, ComfortCar::DEF_COUNT)
            );

            $position->comfortCars()->sync($randomComfortCars);
        }
    }


}
