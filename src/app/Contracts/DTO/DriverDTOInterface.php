<?php

declare(strict_types=1);

namespace App\Contracts\DTO;

interface DriverDTOInterface
{
    public function getTitle(): string;

    public function setTitle(string $title): void;
}
