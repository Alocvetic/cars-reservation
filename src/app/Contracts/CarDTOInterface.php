<?php

namespace App\Contracts;

interface CarDTOInterface
{
    public function getRegisterNumber(): string;

    public function setRegisterNumber(string $register_number): void;

    public function getModel(): string;

    public function setModel(string $model): void;

    public function getComfortCarId(): int;

    public function setComfortCarId(int $comfort_car_id): void;

    public function getDriverId(): int;

    public function setDriverId(int $driver_id): void;

    public function isAccess(): bool;

    public function setIsAccess(bool $is_access): void;
}
