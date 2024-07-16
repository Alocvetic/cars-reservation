<?php

namespace Database\Seeders;

use App\Models\ComfortCar;
use Illuminate\Database\Seeder;

class ComfortCarSeeder extends Seeder
{
    public function run(): void
    {
        ComfortCar::factory(4)->create();
    }

}
