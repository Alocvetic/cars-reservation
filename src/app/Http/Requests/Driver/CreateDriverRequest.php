<?php

namespace App\Http\Requests\Driver;

use App\DTO\Driver\CreateDriverDTO;
use Illuminate\Foundation\Http\FormRequest;

class CreateDriverRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Заполните поле',
            'title.string' => 'Должна быть строка',
            'title.min' => 'Длина не менее :min символов',
            'title.max' => 'Длина не более :min символов',
        ];
    }

    public function toDto(): CreateDriverDTO
    {
        $this->validated();

        $dto = new CreateDriverDTO();
        $dto->setTitle('title');

        return $dto;
    }
}
