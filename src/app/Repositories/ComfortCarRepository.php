<?php

namespace App\Repositories;

use App\Contracts\DTO\ComfortCarDTOInterface;
use App\DTO\ComfortCar\{CreateComfortCarDTO, UpdateComfortCarDTO};
use App\Models\{ComfortCar};
use Illuminate\Database\Eloquent\Collection;

class ComfortCarRepository
{
    /**
     * Получение всех записей ComfortCar
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return ComfortCar::all();
    }

    /**
     * Получение записи ComfortCar по id
     *
     * @param int $id
     * @return ComfortCar
     */
    public function getById(int $id): ComfortCar
    {
        return ComfortCar::where('id', $id)->firstOrFail();
    }

    /**
     * Проверка наличия записи ComfortCar по id
     *
     * @param int $id
     * @return bool
     */
    public function checkById(int $id): bool
    {
        return ComfortCar::where('id', $id)->exists();
    }

    /**
     * Создание записи ComfortCar
     *
     * @param CreateComfortCarDTO $dto
     * @return int
     */
    public function create(CreateComfortCarDTO $dto): int
    {
        $comfortCar = new ComfortCar();

        $this->populate($comfortCar, $dto);
        $comfortCar->save();

        return $comfortCar->id;
    }

    /**
     * Обновление записи ComfortCar
     *
     * @param int $id
     * @param UpdateComfortCarDTO $dto
     * @return int
     */
    public function update(int $id, UpdateComfortCarDTO $dto): int
    {
        $comfortCar = ComfortCar::where('id', $id)->first();

        $this->populate($comfortCar, $dto);
        $comfortCar->save();

        return $comfortCar->id;
    }

    /**
     * Подготовка данных ComfortCar
     *
     * @param ComfortCar $comfortCar
     * @param ComfortCarDTOInterface $dto
     * @return ComfortCar
     */
    protected function populate(ComfortCar $comfortCar, ComfortCarDTOInterface $dto): ComfortCar
    {
        $comfortCar->title = $dto->getTitle();

        return $comfortCar;
    }

    /**
     * Удаление записи ComfortCar по Id
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        ComfortCar::where('id', $id)->delete();
    }

    /**
     * Получение всех записей ComfortCar по employee_id
     *
     * @param int $employee_id
     * @return Collection
     */
    public static function getByEmployeeId(int $employee_id): Collection
    {
        $employee = (new EmployeeRepository())->getById($employee_id);

        return $employee->position->comfortCars;
    }
}
