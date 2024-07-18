<?php

declare(strict_types=1);

namespace App\DTO\Booking;

class GetBookingFilterDTO
{
    public ?int $filter_employee_id = null;

    public function allData(): array
    {
        $result = [];

        if ($this->filter_employee_id !== null) {
            $result['filter']['employee_id'] = $this->filter_employee_id;
        }

        return $result;
    }

    public function getFilterEmployeeId(): ?int
    {
        return $this->filter_employee_id;
    }

    public function setFilterEmployeeId(?int $filter_employee_id): void
    {
        $this->filter_employee_id = $filter_employee_id;
    }
}
