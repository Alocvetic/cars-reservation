<?php

namespace App\Contracts;

interface PositionDTOInterface
{
    public function getTitle(): string;

    public function setTitle(string $title): void;
}
