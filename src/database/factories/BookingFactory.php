<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BookingFactory extends Factory
{
    protected int $carId;
    protected int $employeeId;
    protected Carbon $book_from;
    protected Carbon $book_to;

    public function setCarId(string $carId): static
    {
        $this->carId = $carId;

        return $this;
    }

    public function setEmployeeId(string $employeeId): static
    {
        $this->employeeId = $employeeId;

        return $this;
    }

    public function setBookFrom(Carbon $book_from): static
    {
        $this->book_from = $book_from;

        return $this;
    }

    public function setBookTo(Carbon $book_to): static
    {
        $this->book_to = $book_to;

        return $this;
    }

    public function definition(): array
    {
        return [
            'car_id' => $this->carId,
            'employee_id' => $this->employeeId,
            'book_from' => $this->book_from,
            'book_to' => $this->book_to,
        ];
    }
}
