<?php

declare(strict_types=1);

namespace App\DTO\Driver;

use App\Contracts\DTO\DriverDTOInterface;

class UpdateDriverDTO implements DriverDTOInterface
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
