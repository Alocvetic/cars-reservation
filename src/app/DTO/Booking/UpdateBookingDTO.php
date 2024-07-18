<?php

declare(strict_types=1);

namespace App\DTO\Booking;

use App\Contracts\DTO\BookingDTOInterface;
use Illuminate\Support\Carbon;

class UpdateBookingDTO implements BookingDTOInterface
{
    public int $car_id;
    public int $employee_id;
    public ?Carbon $book_from = null;
    public ?Carbon $book_to = null;

    public function getCarId(): int
    {
        return $this->car_id;
    }

    public function setCarId(int $car_id): void
    {
        $this->car_id = $car_id;
    }

    public function getEmployeeId(): int
    {
        return $this->employee_id;
    }

    public function setEmployeeId(int $employee_id): void
    {
        $this->employee_id = $employee_id;
    }

    public function getBookFrom(): ?Carbon
    {
        return $this->book_from;
    }

    public function setBookFrom(?Carbon $book_from): void
    {
        $this->book_from = $book_from;
    }

    public function getBookTo(): ?Carbon
    {
        return $this->book_to;
    }

    public function setBookTo(?Carbon $book_to): void
    {
        $this->book_to = $book_to;
    }
}
