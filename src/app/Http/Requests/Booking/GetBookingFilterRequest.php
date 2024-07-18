<?php

declare(strict_types=1);

namespace App\Http\Requests\Booking;

use App\DTO\Booking\GetBookingFilterDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetBookingFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'filter.employee_id' => ['integer', 'min:1', 'max:99999999999', Rule::exists('employees', 'id')],
        ];
    }

    public function toDto(): GetBookingFilterDTO
    {
        $result = $this->validated();
        $dto = new GetBookingFilterDTO();

        if (isset($result['filter'])) {
            $filters = $result['filter'];

            $dto->setFilterEmployeeId(isset($filters['employee_id']) ? (int)$filters['employee_id'] : null);
        }

        return $dto;
    }
}
