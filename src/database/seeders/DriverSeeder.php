<?php

namespace Database\Seeders;

use App\Models\Driver;
use Database\DbDefData;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        Driver::factory(DbDefData::COUNT_DRIVER)->create();
    }
}
