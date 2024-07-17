<?php

namespace App\Repositories;

use App\Contracts\BookingDTOInterface;
use App\DTO\Booking\{CreateBookingDTO, UpdateBookingDTO};
use App\Exceptions\BookingException;
use App\Filters\BookingFilter;
use App\Http\Requests\Booking\GetBookingFilterRequest;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class BookingRepository
{
    public function __construct(
        protected BookingFilter $filter,
    ) {
    }

    /**
     * Получение всех записей Booking
     *
     * @param GetBookingFilterRequest $request
     * @return Collection
     */
    public function getAll(GetBookingFilterRequest $request): Collection
    {
        if (!empty($request->query())) {
            $query = $this->filter->buildQuery($request);
            return $query->get();
        }

        return Booking::all();
    }

    /**
     * Получение записи Booking по id
     *
     * @param int $id
     * @return Booking
     */
    public function getById(int $id): Booking
    {
        return Booking::where('id', $id)->firstOrFail();
    }

    /**
     * Проверка наличия записи Booking по id
     *
     * @param int $id
     * @return bool
     */
    public function checkById(int $id): bool
    {
        return Booking::where('id', $id)->exists();
    }

    /**
     * Создание записи Booking
     *
     * @param CreateBookingDTO $dto
     * @return int
     * @throws BookingException
     */
    public function create(CreateBookingDTO $dto): int
    {
        $booking = new Booking();

        $this->populate($booking, $dto);

        if (self::isAvailableBooking($dto->getCarId(), $dto->getBookFrom(), $dto->getBookTo())) {
            $booking->save();
        } else {
            throw new BookingException();
        }

        return $booking->id;
    }

    /**
     * Обновление записи Booking
     *
     * @param int $id
     * @param UpdateBookingDTO $dto
     * @return int
     * @throws BookingException
     */
    public function update(int $id, UpdateBookingDTO $dto): int
    {
        $booking = Booking::where('id', $id)->first();

        $this->populate($booking, $dto);

        if (self::isAvailableBooking($dto->getCarId(), $dto->getBookFrom(), $dto->getBookTo())) {
            $booking->save();
        } else {
            throw new BookingException();
        }

        return $booking->id;
    }

    /**
     * Подготовка данных Booking
     *
     * @param Booking $booking
     * @param BookingDTOInterface $dto
     * @return Booking
     */
    protected function populate(Booking $booking, BookingDTOInterface $dto): Booking
    {
        $booking->car_id = $dto->getCarId();
        $booking->employee_id = $dto->getEmployeeId();
        $booking->book_from = $dto->getBookFrom();
        $booking->book_to = $dto->getBookTo();

        return $booking;
    }

    /**
     * Проверка занятого автомобиля в заданном периоде времени
     *
     * @param int $car_id
     * @param Carbon $from
     * @param Carbon $to
     * @return bool
     */
    public static function isAvailableBooking(int $car_id, Carbon $from, Carbon $to): bool
    {
        $bookings = Booking::where('car_id', $car_id)
            ->where(function ($query) use ($from, $to) {
                $query->whereBetween('book_from', [$from, $to])
                    ->orWhereBetween('book_to', [$from, $to])
                    ->orWhere(function ($q) use ($from, $to) {
                        $q->where('book_from', '<=', $from)
                            ->where('book_to', '>=', $to);
                    });
            })
            ->exists();

        return !$bookings;
    }

    /**
     * Удаление записи Booking по Id
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        Booking::where('id', $id)->delete();
    }
}
