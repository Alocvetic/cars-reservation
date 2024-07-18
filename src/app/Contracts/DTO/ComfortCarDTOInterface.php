<?php

declare(strict_types=1);

namespace App\Contracts\DTO;

interface ComfortCarDTOInterface
{
    public function getTitle(): string;

    public function setTitle(string $title): void;
}
