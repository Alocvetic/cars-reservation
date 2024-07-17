<?php

namespace App\Contracts\DTO;

interface ComfortCarDTOInterface
{
    public function getTitle(): string;

    public function setTitle(string $title): void;
}
