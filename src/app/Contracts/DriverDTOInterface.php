<?php

namespace App\Contracts;

interface DriverDTOInterface
{
    public function getTitle(): string;

    public function setTitle(string $title): void;
}
