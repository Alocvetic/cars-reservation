<?php

declare(strict_types=1);

namespace App\DTO\Position;

use App\Contracts\DTO\PositionDTOInterface;

class UpdatePositionDTO implements PositionDTOInterface
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
