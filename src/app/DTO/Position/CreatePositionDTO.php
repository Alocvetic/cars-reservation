<?php

namespace App\DTO\Position;

use App\Contracts\DTO\PositionDTOInterface;

class CreatePositionDTO implements PositionDTOInterface
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
