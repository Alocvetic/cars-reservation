<?php

namespace App\Http\Requests\Car;

use App\DTO\Car\CreateCarDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'register_number' => [
                'required',
                'string',
                'regex:/^[A-Z]{1}[0-9]{3}[A-Z]{2}$/',
                Rule::unique('cars', 'register_number')
            ],
            'model' => ['required', 'string', 'min:2', 'max:255'],
            'driver_id' => ['required', 'integer', 'min:1', 'max:99999999999', Rule::exists('drivers', 'id')],
            'comfort_car_id' => ['required', 'integer', 'min:1', 'max:99999999999', Rule::exists('comfort_cars', 'id')],
            'booking' => ['string|nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'register_number.regex' => 'Формат номера A999AA',
            'booking.string' => 'Должна быть строка json|null',
            'booking.nullable' => 'Должна быть строка json|null',
        ];
    }

    public function toDto(): CreateCarDTO
    {
        $result = $this->validated();

        $dto = new CreateCarDTO();
        $dto->setRegisterNumber($result['register_number']);
        $dto->setModel($result['model']);
        $dto->setDriverId((int)$result['driver_id']);
        $dto->setComfortCarId((int)$result['comfort_car_id']);
        if (isset($result['booking'])) {
            $dto->setBookingJson($result['booking']);
        }

        return $dto;
    }
}
