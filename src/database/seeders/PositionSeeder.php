<?php

namespace Database\Seeders;

use App\Models\{ComfortCar, Position};
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $comfortCars = ComfortCar::all()->pluck('id');

        for ($i = 0; $i < Position::COUNT_FACTORY; $i++) {
            $position = Position::factory()->create();

            $randomComfortCars = $this->getRandomCollection($comfortCars, random_int(1, ComfortCar::COUNT_FACTORY));
            $position->comfortCars()->sync($randomComfortCars);
        }
    }

    /**
     * Получение рандомных записей
     *
     * @param Collection $collection
     * @param int $count
     * @return array
     */
    protected function getRandomCollection(Collection $collection, int $count): array
    {
        $result = [];
        while (count($result) < $count) {
            $item = $collection->random();
            if (!in_array($item, $result)) {
                $result[] = $item;
            }
        }

        return $result;
    }
}
