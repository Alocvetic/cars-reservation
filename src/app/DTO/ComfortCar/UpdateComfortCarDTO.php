<?php

namespace App\DTO\ComfortCar;

use App\Contracts\DTO\ComfortCarDTOInterface;

class UpdateComfortCarDTO implements ComfortCarDTOInterface
{
    public string $title;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
