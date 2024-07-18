<?php

declare(strict_types=1);

namespace App\Http\Requests\ComfortCar;

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

    public function toDto(): CreateComfortCarDTO
    {
        $result = $this->validated();

        $dto = new CreateComfortCarDTO();
        $dto->setTitle($result['title']);

        return $dto;
    }
}
