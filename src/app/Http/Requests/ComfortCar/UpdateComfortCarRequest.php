<?php

namespace App\Http\Requests\ComfortCar;

use App\DTO\ComfortCar\UpdateComfortCarDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateComfortCarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'title' => [
                'required',
                'string',
                'min:2',
                'max:255',
                Rule::unique('comfort_cars', 'title')->ignore($id, 'title')
            ],
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

    public function toDto(): UpdateComfortCarDTO
    {
        $result = $this->validated();

        $dto = new UpdateComfortCarDTO();
        $dto->setTitle($result['title']);

        return $dto;
    }
}
