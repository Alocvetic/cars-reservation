<?php

namespace App\Http\Requests\Car;

use App\DTO\Car\UpdateCarDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'register_number' => [
                'required',
                'string',
                'regex:/^[A-Z]{1}[0-9]{3}[A-Z]{2}$/',
                Rule::unique('cars', 'register_number')->ignore($id, 'id')
            ],
            'model' => ['required', 'string', 'min:2', 'max:255'],
            'driver_id' => ['required', 'integer', 'min:1', 'max:99999999999', Rule::exists('drivers', 'id')],
            'comfort_car_id' => ['required', 'integer', 'min:1', 'max:99999999999', Rule::exists('comfort_cars', 'id')],
            'is_access' => ['required', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'register_number.regex' => 'Формат номера A999AA',
        ];
    }

    public function toDto(): UpdateCarDTO
    {
        $result = $this->validated();

        $dto = new UpdateCarDTO();
        $dto->setRegisterNumber($result['register_number']);
        $dto->setModel($result['model']);
        $dto->setDriverId((int)$result['driver_id']);
        $dto->setComfortCarId((int)$result['comfort_car_id']);
        $dto->setIsAccess((bool)$result['is_access']);

        return $dto;
    }
}
