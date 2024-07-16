<?php

namespace App\Contracts;

interface ComfortCarDTOInterface
{
    public function getTitle(): string;

    public function setTitle(string $title): void;
}
