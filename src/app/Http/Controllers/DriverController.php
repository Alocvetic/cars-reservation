<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Driver\{CreateDriverRequest, UpdateDriverRequest};
use App\Repositories\DriverRepository;
use App\Services\ResponseApi;
use Illuminate\Http\JsonResponse;

class DriverController extends Controller
{
    public function __construct(
        protected DriverRepository $repository,
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

    public function create(CreateDriverRequest $request): JsonResponse
    {
        $dto = $request->toDto();
        $id = $this->repository->create($dto);

        return ResponseApi::json(['id' => $id], message: 'Водитель успешно добавлен');
    }

    public function update(UpdateDriverRequest $request, int $id): JsonResponse
    {
        if (!$this->repository->checkById($id)) {
            return ResponseApi::json(status: 404, message: 'Запись не найдена');
        }

        $dto = $request->toDto();
        $id = $this->repository->update($id, $dto);

        return ResponseApi::json(['id' => $id], message: 'Данные водителя успешно обновлены');
    }

    public function delete(int $id): JsonResponse
    {
        if (!$this->repository->checkById($id)) {
            return ResponseApi::json(status: 404, message: 'Запись не найдена');
        }

        $this->repository->delete($id);

        return ResponseApi::json(message: 'Водитель успешно удален');
    }
}
