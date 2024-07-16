<?php

namespace App\Repositories;

use App\Contracts\DriverDTOInterface;
use App\DTO\Driver\{
    CreateDriverDTO,
    UpdateDriverDTO
};
use App\Models\Driver;
use Illuminate\Database\Eloquent\Collection;

class DriverRepository
{
    /**
     * Получение всех записей Driver
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Driver::all();
    }

    /**
     * Получение записи Driver по id
     *
     * @param int $id
     * @return Driver
     */
    public function getById(int $id): Driver
    {
        return Driver::where('id', $id)->firstOrFail();
    }

    /**
     * Проверка наличия записи Driver по id
     *
     * @param int $id
     * @return bool
     */
    public function checkById(int $id): bool
    {
        return Driver::where('id', $id)->exists();
    }

    /**
     * Создание записи Driver
     *
     * @param CreateDriverDTO $dto
     * @return int
     */
    public function create(CreateDriverDTO $dto): int
    {
        $driver = new Driver();

        $this->populate($driver, $dto);
        $driver->save();

        return $driver->id;
    }

    /**
     * Обновление записи Driver
     *
     * @param int $id
     * @param UpdateDriverDTO $dto
     * @return int
     */
    public function update(int $id, UpdateDriverDTO $dto): int
    {
        $driver = Driver::where('id', $id)->first();

        $this->populate($driver, $dto);
        $driver->save();

        return $driver->id;
    }

    /**
     * Подготовка данных Driver
     *
     * @param Driver $driver
     * @param DriverDTOInterface $dto
     * @return Driver
     */
    protected function populate(Driver $driver, DriverDTOInterface $dto): Driver
    {
        $driver->title = $dto->getTitle();

        return $driver;
    }

    /**
     * Удаление записи Driver по Id
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        Driver::where('id', $id)->delete();
    }
}
