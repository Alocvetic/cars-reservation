<?php

namespace App\Contracts;

use Illuminate\Support\Carbon;

interface BookingDTOInterface
{
    public function getCarId(): int;

    public function setCarId(int $car_id): void;

    public function getEmployeeId(): int;

    public function setEmployeeId(int $employee_id): void;

    public function getBookFrom(): ?Carbon;

    public function setBookFrom(?Carbon $book_from): void;

    public function getBookTo(): ?Carbon;

    public function setBookTo(?Carbon $book_to): void;
}
