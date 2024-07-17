<?php

namespace Database\Seeders;

use App\Models\ComfortCar;
use Illuminate\Database\Seeder;

class ComfortCarSeeder extends Seeder
{
    public function run(): void
    {
        $comfortCars = [
            'Эконом',
            'Комфорт',
            'Бизнес',
            'Премиум',
        ];

        for ($i = 0; $i < ComfortCar::DEF_COUNT; $i++) {
            ComfortCar::factory()
                ->setTitle(ComfortCar::DEF_VALUES[$i])
                ->create();
        }
    }
}
