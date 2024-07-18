<?php

declare(strict_types=1);

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
            'title' => ['required', 'string', 'min:2', 'max:255', Rule::unique('comfort_cars', 'title')->ignore($id, 'id')],
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
