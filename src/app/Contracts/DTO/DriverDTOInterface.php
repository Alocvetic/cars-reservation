<?php

namespace App\Contracts\DTO;

interface DriverDTOInterface
{
    public function getTitle(): string;

    public function setTitle(string $title): void;
}
