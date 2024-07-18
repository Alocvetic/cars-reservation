<?php

namespace Database\Seeders;

use App\Models\ComfortCar;
use Database\DbDefData;
use Illuminate\Database\Seeder;

class ComfortCarSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < DbDefData::COUNT_COMFORT; $i++) {
            ComfortCar::factory()
                ->setTitle(DbDefData::COMFORTS[$i])
                ->create();
        }
    }
}
