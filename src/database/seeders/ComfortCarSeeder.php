<?php

namespace Database\Seeders;

use App\Models\ComfortCar;
use Illuminate\Database\Seeder;

class ComfortCarSeeder extends Seeder
{
    public function run(): void
    {
        ComfortCar::factory(ComfortCar::COUNT_FACTORY)->create();
    }
}
