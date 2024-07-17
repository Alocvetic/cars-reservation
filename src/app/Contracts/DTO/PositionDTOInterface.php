<?php

namespace App\Contracts\DTO;

interface PositionDTOInterface
{
    public function getTitle(): string;

    public function setTitle(string $title): void;
}
