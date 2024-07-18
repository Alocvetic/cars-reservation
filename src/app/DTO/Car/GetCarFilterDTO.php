<?php

declare(strict_types=1);

namespace App\DTO\Car;

use Illuminate\Support\Carbon;

class GetCarFilterDTO
{
    public ?int $filter_employee_id = null;
    public ?Carbon $filter_book_from = null;
    public ?Carbon $filter_book_to = null;
    public ?string $sort = null;

    public function allData(): array
    {
        $result = [];

        if ($this->filter_employee_id !== null) {
            $result['filter']['employee_id'] = $this->filter_employee_id;
        }
        if ($this->filter_book_from !== null && $this->filter_book_to !== null) {
            $result['filter']['book_from'] = $this->filter_book_from;
            $result['filter']['book_to'] = $this->filter_book_to;
        }
        if ($this->sort !== null) {
            $result['sort'] = $this->sort;
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

    public function getSort(): ?string
    {
        return $this->sort;
    }

    public function setSort(?string $sort): void
    {
        $this->sort = $sort;
    }

    public function getFilterBookFrom(): ?Carbon
    {
        return $this->filter_book_from;
    }

    public function setFilterBookFrom(?Carbon $filter_book_from): void
    {
        $this->filter_book_from = $filter_book_from;
    }

    public function getFilterBookTo(): ?Carbon
    {
        return $this->filter_book_to;
    }

    public function setFilterBookTo(?Carbon $filter_book_to): void
    {
        $this->filter_book_to = $filter_book_to;
    }
}
