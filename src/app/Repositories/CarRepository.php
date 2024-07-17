<?php

namespace App\Repositories;

use App\Contracts\CarDTOInterface;
use App\DTO\Car\CreateCarDTO;
use App\DTO\Car\UpdateCarDTO;
use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;

class CarRepository
{
    /**
     * Получение всех записей Car
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Car::all();
    }

    /**
     * Получение записи Car по id
     *
     * @param int $id
     * @return Car
     */
    public function getById(int $id): Car
    {
        return Car::where('id', $id)->firstOrFail();
    }

    /**
     * Проверка наличия записи Car по id
     *
     * @param int $id
     * @return bool
     */
    public function checkById(int $id): bool
    {
        return Car::where('id', $id)->exists();
    }

    /**
     * Создание записи Car
     *
     * @param CreateCarDTO $dto
     * @return int
     */
    public function create(CreateCarDTO $dto): int
    {
        $car = new Car();

        $this->populate($car, $dto);
        $car->save();

        return $car->id;
    }

    /**
     * Обновление записи Car
     *
     * @param int $id
     * @param UpdateCarDTO $dto
     * @return int
     */
    public function update(int $id, UpdateCarDTO $dto): int
    {
        $car = Car::where('id', $id)->first();

        $this->populate($car, $dto);
        $car->save();

        return $car->id;
    }

    /**
     * Подготовка данных Car
     *
     * @param Car $car
     * @param CarDTOInterface $dto
     * @return Car
     */
    protected function populate(Car $car, CarDTOInterface $dto): Car
    {
        $car->register_number = $dto->getRegisterNumber();
        $car->model = $dto->getModel();
        $car->comfort_car_id = $dto->getComfortCarId();
        $car->driver_id = $dto->getDriverId();
        $car->is_access = $dto->isAccess();

        return $car;
    }

    /**
     * Удаление записи Car по Id
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        Car::where('id', $id)->delete();
    }
}
