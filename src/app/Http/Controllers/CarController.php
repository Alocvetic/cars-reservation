<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\{CreateCarRequest, GetCarFilterRequest, UpdateCarRequest};
use App\Repositories\CarRepository;
use App\Services\ResponseApi;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
    public function __construct(
        protected CarRepository $repository,
    ) {
    }

    public function index(GetCarFilterRequest $request): JsonResponse
    {
        $data = $this->repository->getAll($request);

        return ResponseApi::json($data->toArray());
    }

    public function show(int $id): JsonResponse
    {
        $data = $this->repository->getById($id);

        return ResponseApi::json($data->toArray());
    }

    public function create(CreateCarRequest $request): JsonResponse
    {
        $dto = $request->toDto();
        $id = $this->repository->create($dto);

        return ResponseApi::json(['id' => $id], message: 'Автомобиль успешно добавлен');
    }

    public function update(UpdateCarRequest $request, int $id): JsonResponse
    {
        if (!$this->repository->checkById($id)) {
            return ResponseApi::json(status: 404, message: 'Запись не найдена');
        }

        $dto = $request->toDto();
        $id = $this->repository->update($id, $dto);

        return ResponseApi::json(['id' => $id], message: 'Данные автомобиля успешно обновлены');
    }

    public function delete(int $id): JsonResponse
    {
        if (!$this->repository->checkById($id)) {
            return ResponseApi::json(status: 404, message: 'Запись не найдена');
        }

        $this->repository->delete($id);

        return ResponseApi::json(message: 'Автомобиль успешно удален');
    }
}
