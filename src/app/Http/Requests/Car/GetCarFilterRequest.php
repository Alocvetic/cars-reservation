<?php

declare(strict_types=1);

namespace App\Http\Requests\Car;

use App\DTO\Car\GetCarFilterDTO;
use App\Rules\AvailableCarSortRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class GetCarFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'filter.employee_id' => [
                'integer',
                'min:1',
                'max:99999999999',
                Rule::exists('employees', 'id')
            ],
            'filter.book_from' => [
                'required_with:filter.book_to',
                'date',
                'after:' . now(),
                'date_format:Y-m-d H:i:s'
            ],
            'filter.book_to' => [
                'required_with:filter.book_from',
                'date',
                'after:book_from',
                'date_format:Y-m-d H:i:s'
            ],
            'sort' => ['string', new AvailableCarSortRule()]
        ];
    }

    public function toDto(): GetCarFilterDTO
    {
        $result = $this->validated();
        $dto = new GetCarFilterDTO();

        if (isset($result['filter'])) {
            $filters = $result['filter'];

            $dto->setFilterEmployeeId(isset($filters['employee_id']) ? (int)$filters['employee_id'] : null);

            $dto->setFilterBookFrom(isset($filters['book_from']) ? Carbon::make($filters['book_from']) : null);
            $dto->setFilterBookTo(isset($filters['book_to']) ? Carbon::make($filters['book_to']) : null);
        }

        $dto->setSort($result['sort'] ?? null);

        return $dto;
    }
}
