<?php

namespace App\Repositories;

use App\Contracts\DTO\PositionDTOInterface;
use App\DTO\Position\{CreatePositionDTO, UpdatePositionDTO};
use App\Models\Position;
use Illuminate\Database\Eloquent\Collection;

class PositionRepository
{
    /**
     * Получение всех записей Position
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Position::all();
    }

    /**
     * Получение записи Position по id
     *
     * @param int $id
     * @return Position
     */
    public function getById(int $id): Position
    {
        return Position::where('id', $id)->firstOrFail();
    }

    /**
     * Проверка наличия записи Position по id
     *
     * @param int $id
     * @return bool
     */
    public function checkById(int $id): bool
    {
        return Position::where('id', $id)->exists();
    }

    /**
     * Создание записи Position
     *
     * @param CreatePositionDTO $dto
     * @return int
     */
    public function create(CreatePositionDTO $dto): int
    {
        $position = new Position();

        $this->populate($position, $dto);
        $position->save();

        return $position->id;
    }

    /**
     * Обновление записи Position
     *
     * @param int $id
     * @param UpdatePositionDTO $dto
     * @return int
     */
    public function update(int $id, UpdatePositionDTO $dto): int
    {
        $position = Position::where('id', $id)->first();

        $this->populate($position, $dto);
        $position->save();

        return $position->id;
    }

    /**
     * Подготовка данных Position
     *
     * @param Position $position
     * @param PositionDTOInterface $dto
     * @return Position
     */
    protected function populate(Position $position, PositionDTOInterface $dto): Position
    {
        $position->title = $dto->getTitle();

        return $position;
    }

    /**
     * Удаление записи Position по Id
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        Position::where('id', $id)->delete();
    }
}
