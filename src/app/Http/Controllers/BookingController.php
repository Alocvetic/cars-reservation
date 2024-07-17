<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\{CreateBookingRequest, UpdateBookingRequest};
use App\Repositories\BookingRepository;
use App\Services\ResponseApi;
use Illuminate\Http\JsonResponse;

class BookingController extends Controller
{
    public function __construct(
        protected BookingRepository $repository,
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

    public function create(CreateBookingRequest $request): JsonResponse
    {
        $dto = $request->toDto();
        $id = $this->repository->create($dto);

        return ResponseApi::json(['id' => $id], message: 'Бронь успешно добавлена');
    }

    public function update(UpdateBookingRequest $request, int $id): JsonResponse
    {
        if (!$this->repository->checkById($id)) {
            return ResponseApi::json(status: 404, message: 'Запись не найдена');
        }

        $dto = $request->toDto();
        $id = $this->repository->update($id, $dto);

        return ResponseApi::json(['id' => $id], message: 'Данные брони успешно обновлены');
    }

    public function delete(int $id): JsonResponse
    {
        if (!$this->repository->checkById($id)) {
            return ResponseApi::json(status: 404, message: 'Запись не найдена');
        }

        $this->repository->delete($id);

        return ResponseApi::json(message: 'Бронь успешно удалена');
    }
}
