<?php

namespace App\Http\Requests\Employee;

use App\DTO\Employee\CreateEmployeeDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:255'],
            'position_id' => ['required', 'integer', 'min:1', 'max:99999999999', Rule::exists('positions', 'id')],
        ];
    }

    public function toDto(): CreateEmployeeDTO
    {
        $result = $this->validated();

        $dto = new CreateEmployeeDTO();
        $dto->setTitle($result['title']);
        $dto->setPositionId((int)$result['position_id']);

        return $dto;
    }
}
