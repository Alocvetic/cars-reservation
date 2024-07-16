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

    public function toDto(): CreateDriverDTO
    {
        $result = $this->validated();

        $dto = new CreateDriverDTO();
        $dto->setTitle($result['title']);

        return $dto;
    }
}
