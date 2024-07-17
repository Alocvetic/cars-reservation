<?php

namespace App\Repositories;

use App\Contracts\DTO\EmployeeDTOInterface;
use App\DTO\Employee\{CreateEmployeeDTO, UpdateEmployeeDTO};
use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository
{
    /**
     * Получение всех записей Employee
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Employee::all();
    }

    /**
     * Получение записи Employee по id
     *
     * @param int $id
     * @return Employee
     */
    public function getById(int $id): Employee
    {
        return Employee::where('id', $id)->firstOrFail();
    }

    /**
     * Проверка наличия записи Employee по id
     *
     * @param int $id
     * @return bool
     */
    public function checkById(int $id): bool
    {
        return Employee::where('id', $id)->exists();
    }

    /**
     * Создание записи Employee
     *
     * @param CreateEmployeeDTO $dto
     * @return int
     */
    public function create(CreateEmployeeDTO $dto): int
    {
        $employee = new Employee();

        $this->populate($employee, $dto);
        $employee->save();

        return $employee->id;
    }

    /**
     * Обновление записи Employee
     *
     * @param int $id
     * @param UpdateEmployeeDTO $dto
     * @return int
     */
    public function update(int $id, UpdateEmployeeDTO $dto): int
    {
        $employee = Employee::where('id', $id)->first();

        $this->populate($employee, $dto);
        $employee->save();

        return $employee->id;
    }

    /**
     * Подготовка данных Employee
     *
     * @param Employee $employee
     * @param EmployeeDTOInterface $dto
     * @return Employee
     */
    protected function populate(Employee $employee, EmployeeDTOInterface $dto): Employee
    {
        $employee->title = $dto->getTitle();
        $employee->position_id = $dto->getPositionId();

        return $employee;
    }

    /**
     * Удаление записи Employee по Id
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        Employee::where('id', $id)->delete();
    }
}
