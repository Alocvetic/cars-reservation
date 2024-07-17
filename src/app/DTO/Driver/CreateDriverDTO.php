<?php

namespace App\DTO\Driver;

use App\Contracts\DTO\DriverDTOInterface;

class CreateDriverDTO implements DriverDTOInterface
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
