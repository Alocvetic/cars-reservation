<?php

namespace App\Http\Controllers;

use App\Http\Requests\{CreateComfortCarRequest, UpdateComfortCarRequest};
use App\Repositories\ComfortCarRepository;
use App\Services\ResponseApi;
use Illuminate\Http\JsonResponse;

class ComfortCarController extends Controller
{
    public function __construct(
        protected ComfortCarRepository $repository,
    ) {
    }

    public function index(): JsonResponse
    {
        $data = $this->repository->getAll();

        return ResponseApi::json($data->toArray());
    }

    public function show(int $id): JsonResponse
    {
        $data = $this->repository->getById($id);

        return ResponseApi::json($data->toArray());
    }

    public function create(CreateComfortCarRequest $request): JsonResponse
    {
        $dto = $request->toDto();
        $id = $this->repository->create($dto);

        return ResponseApi::json(['id' => $id], message: 'Комфорт успешно создан');
    }

    public function update(UpdateComfortCarRequest $request, int $id): JsonResponse
    {
        if (!$this->repository->checkById($id)) {
            return ResponseApi::json(status: 404, message: 'Запись не найдена');
        }

        $dto = $request->toDto();
        $id = $this->repository->update($id, $dto);

        return ResponseApi::json(['id' => $id], message: 'Комфорт успешно обновлен');
    }

    public function delete(int $id): JsonResponse
    {
        if (!$this->repository->checkById($id)) {
            return ResponseApi::json(status: 404, message: 'Запись не найдена');
        }

        $this->repository->delete($id);

        return ResponseApi::json(message: 'Комфорт успешно удален');
    }
}
