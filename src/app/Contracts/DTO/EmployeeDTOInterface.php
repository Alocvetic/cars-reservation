<?php

namespace App\Contracts\DTO;

interface EmployeeDTOInterface
{
    public function getTitle(): string;

    public function setTitle(string $title): void;

    public function getPositionId(): int;

    public function setPositionId(int $position_id): void;
}
