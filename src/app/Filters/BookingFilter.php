<?php

declare(strict_types=1);

namespace App\Filters;

use App\DTO\Booking\GetBookingFilterDTO;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Builder;

class BookingFilter
{
    protected array $dtoArray = [];

    public function __construct(
        protected Builder $query,
    ) {
        $this->query = Booking::query();
    }

    public function buildQuery(GetBookingFilterDTO $dto): Builder
    {
        $this->dtoArray = $dto->allData();

        if (isset($this->dtoArray['filter'])) {
            $this->filter();
        }

        return $this->query;
    }

    /**
     * Фильтрация записей Bookings
     *
     * @return void
     */
    protected function filter(): void
    {
        $filters = $this->dtoArray['filter'];

        // filter by employee
        if (isset($filters['employee_id'])) {
            $this->query->where('employee_id', '=', $filters['employee_id']);
        }
    }
}
