<?php

declare(strict_types=1);

namespace App\Http\Requests\Driver;

use App\DTO\Driver\UpdateDriverDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDriverRequest extends FormRequest
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

    public function toDto(): UpdateDriverDTO
    {
        $result = $this->validated();

        $dto = new UpdateDriverDTO();
        $dto->setTitle($result['title']);

        return $dto;
    }
}
