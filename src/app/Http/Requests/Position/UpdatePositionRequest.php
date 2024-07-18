<?php

declare(strict_types=1);

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
            'title' => ['required', 'string', 'min:2', 'max:255', Rule::unique('positions', 'title')->ignore($id, 'id')],
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
