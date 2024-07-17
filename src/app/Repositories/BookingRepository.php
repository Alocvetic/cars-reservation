<?php

namespace App\Repositories;

use App\Contracts\BookingDTOInterface;
use App\DTO\Booking\{CreateBookingDTO, UpdateBookingDTO};
use App\Models\Booking;
use Illuminate\Database\Eloquent\Collection;

class BookingRepository
{
    /**
     * Получение всех записей Booking
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
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
     */
    public function create(CreateBookingDTO $dto): int
    {
        $booking = new Booking();

        $this->populate($booking, $dto);
        $booking->save();

        return $booking->id;
    }

    /**
     * Обновление записи Booking
     *
     * @param int $id
     * @param UpdateBookingDTO $dto
     * @return int
     */
    public function update(int $id, UpdateBookingDTO $dto): int
    {
        $booking = Booking::where('id', $id)->first();

        $this->populate($booking, $dto);
        $booking->save();

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
        $booking->book_from = $dto->getBookFrom();
        $booking->book_to = $dto->getBookTo();

        return $booking;
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
