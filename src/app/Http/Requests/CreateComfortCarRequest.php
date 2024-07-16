<?php

namespace App\Http\Requests;

use App\DTO\ComfortCar\CreateComfortCarDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateComfortCarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:255', Rule::unique('comfort_cars', 'title')],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Заполните поле',
            'title.string' => 'Должна быть строка',
            'title.min' => 'Длина не менее :min символов',
            'title.max' => 'Длина не более :min символов',
            'title.unique' => 'Значение уже существует',
        ];
    }

    public function toDto(): CreateComfortCarDTO
    {
        $this->validated();

        $dto = new CreateComfortCarDTO();
        $dto->setTitle('title');

        return $dto;
    }
}
