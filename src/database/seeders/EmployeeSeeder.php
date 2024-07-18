<?php

namespace Database\Seeders;

use App\Models\Employee;
use Database\DbDefData;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        Employee::factory(DbDefData::COUNT_EMPLOYEE)->create();
    }
}
