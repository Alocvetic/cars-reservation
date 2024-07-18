<?php

declare(strict_types=1);

namespace App\Http\Requests\Booking;

use App\DTO\Booking\UpdateBookingDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class UpdateBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'car_id' => ['required', 'integer', 'min:1', 'max:99999999999', Rule::exists('cars', 'id')],
            'employee_id' => ['required', 'integer', 'min:1', 'max:99999999999', Rule::exists('employees', 'id')],
            'book_from' => ['required', 'date', 'after:' . now(), 'date_format:Y-m-d H:i:s'],
            'book_to' => ['required', 'date', 'after:book_from', 'date_format:Y-m-d H:i:s'],
        ];
    }

    public function toDto(): UpdateBookingDTO
    {
        $result = $this->validated();

        $dto = new UpdateBookingDTO();
        $dto->setCarId((int)$result['car_id']);
        $dto->setEmployeeId((int)$result['employee_id']);
        $dto->setBookFrom(Carbon::make($result['book_from']));
        $dto->setBookTo(Carbon::make($result['book_to']));

        return $dto;
    }
}
