<?php

namespace App\DTO\Employee;

use App\Contracts\DTO\EmployeeDTOInterface;

class UpdateEmployeeDTO implements EmployeeDTOInterface
{
    public string $title;
    public int $position_id;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPositionId(): int
    {
        return $this->position_id;
    }

    public function setPositionId(int $position_id): void
    {
        $this->position_id = $position_id;
    }
}
