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
                Rule::unique('cars', 'register_number')->ignore($id, 'register_number')
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
            'register_number.required' => 'Заполните поле',
            'register_number.string' => 'Должна быть строка',
            'register_number.regex' => 'Формат номера A999AA',
            'register_number.unique' => 'Значение уже существует',
            'model.required' => 'Заполните поле',
            'model.string' => 'Должна быть строка',
            'model.min' => 'Длина не менее :min символов',
            'model.max' => 'Длина не более :min символов',
            'driver_id.required' => 'Заполните поле',
            'driver_id.integer' => 'Должно быть целое число',
            'driver_id.min' => 'Длина не менее :min символов',
            'driver_id.max' => 'Длина не более :min символов',
            'driver_id.exists' => 'Выберите существующего водителя',
            'comfort_car_id.required' => 'Заполните поле',
            'comfort_car_id.integer' => 'Должно быть целое число',
            'comfort_car_id.min' => 'Длина не менее :min символов',
            'comfort_car_id.max' => 'Длина не более :min символов',
            'comfort_car_id.exists' => 'Выберите существующий комфорт',
            'is_access.required' => 'Заполните поле',
            'is_access.boolean' => 'Должно быть true|false',
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
