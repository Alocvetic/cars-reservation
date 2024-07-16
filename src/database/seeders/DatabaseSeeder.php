<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ComfortCarSeeder::class);
        $this->call(DriverSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(EmployeeSeeder::class);
    }
}
