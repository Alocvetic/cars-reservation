<?php

namespace App\DTO\Car;

use App\Contracts\CarDTOInterface;

class CreateCarDTO implements CarDTOInterface
{
    public string $register_number;
    public string $model;
    public int $comfort_car_id;
    public int $driver_id;
    public ?string $booking_json = null;

    public function getRegisterNumber(): string
    {
        return $this->register_number;
    }

    public function setRegisterNumber(string $register_number): void
    {
        $this->register_number = $register_number;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getComfortCarId(): int
    {
        return $this->comfort_car_id;
    }

    public function setComfortCarId(int $comfort_car_id): void
    {
        $this->comfort_car_id = $comfort_car_id;
    }

    public function getDriverId(): int
    {
        return $this->driver_id;
    }

    public function setDriverId(int $driver_id): void
    {
        $this->driver_id = $driver_id;
    }

    public function getBookingJson(): ?string
    {
        return $this->booking_json;
    }

    public function setBookingJson(?string $booking_json): void
    {
        $this->booking_json = $booking_json;
    }
}
