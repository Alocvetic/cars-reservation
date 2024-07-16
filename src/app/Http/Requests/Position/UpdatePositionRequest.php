<?php

namespace App\Http\Requests\Position;

use App\DTO\Position\UpdatePositionDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePositionRequest extends FormRequest
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
                Rule::unique('positions', 'title')->ignore($id, 'title')
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

    public function toDto(): UpdatePositionDTO
    {
        $result = $this->validated();

        $dto = new UpdatePositionDTO();
        $dto->setTitle($result['title']);

        return $dto;
    }
}
