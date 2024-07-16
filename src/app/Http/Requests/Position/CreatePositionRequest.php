<?php

namespace App\Http\Requests\Position;

use App\DTO\Position\CreatePositionDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePositionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:255', Rule::unique('positions', 'title')],
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

    public function toDto(): CreatePositionDTO
    {
        $result = $this->validated();

        $dto = new CreatePositionDTO();
        $dto->setTitle($result['title']);

        return $dto;
    }
}
