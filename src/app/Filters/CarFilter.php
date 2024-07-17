<?php

namespace App\Filters;

use App\Http\Requests\Car\GetCarFilterRequest;
use App\Models\Car;
use App\Repositories\ {BookingRepository, ComfortCarRepository};
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class CarFilter
{
    public function __construct(
        protected GetCarFilterRequest $request,
        protected Builder $query,
    ) {
        $this->query = Car::query();
    }

    public function buildQuery(GetCarFilterRequest $request): Builder
    {
        $this->request = $request;

        if ($request->has('filter')) {
            $this->filter();
        }

        // select fields for Cars and ComfortCars
        $this->query
            ->join('comfort_cars', 'cars.comfort_car_id', '=', 'comfort_cars.id')
            ->select('cars.register_number', 'cars.model', 'comfort_cars.title as comfort');

        if ($request->has('sort')) {
            $this->sort();
        }

        return $this->query;
    }

    /**
     * Фильтрация записей Cars
     *
     * @return void
     */
    protected function filter(): void
    {
        $filters = $this->request->input('filter');

        // filter by employee
        if (isset($filters['employee_id'])) {
            $this->filterByEmployeeId((int)$filters['employee_id']);
        }

        // filter by bookings
        if (isset($filters['book_from']) && isset($filters['book_to'])) {
            $this->filterByBookingsDate(Carbon::make($filters['book_from']), Carbon::make($filters['book_to']));
        }
    }

    /**
     * Фильтрация записей Cars по employee_id
     *
     * @param int $employee_id
     * @return void
     */
    protected function filterByEmployeeId(int $employee_id): void
    {
        $comfortCars = ComfortCarRepository::getByEmployeeId($employee_id);
        $comfortCarsIdList = $comfortCars->pluck('id')->toArray();

        $this->query->whereIn('cars.comfort_car_id', $comfortCarsIdList);
    }

    /**
     * Фильтрация по доступным Cars в указанный период
     *
     * @param Carbon $book_from
     * @param Carbon $book_to
     * @return void
     */
    protected function filterByBookingsDate(Carbon $book_from, Carbon $book_to): void
    {
        $carIdList = $this->query->get()->pluck('id');

        $availableCarsIdList = [];
        foreach ($carIdList as $carId) {
            $isAvailable = BookingRepository::isAvailableBooking($carId, $book_from, $book_to);
            if ($isAvailable) {
                $availableCarsIdList[] = $carId;
            }
        }

        $this->query->whereIn('cars.id', $availableCarsIdList);
    }

    /**
     * Сортировка записей Cars
     *
     * @return void
     */
    protected function sort(): void
    {
        $sortParams = explode(',', $this->request->input('sort'));

        foreach ($sortParams as $sort) {
            if ($sort[0] === '-') {
                $this->query->orderBy(substr($sort, 1), 'desc');
            } else {
                $this->query->orderBy($sort);
            }
        }
    }
}
