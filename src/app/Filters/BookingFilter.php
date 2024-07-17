<?php

namespace App\Filters;

use App\Http\Requests\Booking\GetBookingFilterRequest;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Builder;

class BookingFilter
{
    public function __construct(
        protected GetBookingFilterRequest $request,
        protected Builder $query,
    ) {
        $this->query = Booking::query();
    }

    public function buildQuery(GetBookingFilterRequest $request): Builder
    {
        $this->request = $request;

        if ($request->has('filter')) {
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
        $filters = $this->request->input('filter');

        // filter by employee
        if (isset($filters['employee_id'])) {
            $this->query->where('employee_id', '=', $filters['employee_id']);
        }
    }
}
