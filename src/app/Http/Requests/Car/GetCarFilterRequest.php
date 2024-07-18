<?php

declare(strict_types=1);

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;
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
            'filter.employee_id' => ['integer', 'min:1', 'max:99999999999', Rule::exists('employees', 'id')],
            'filter.book_from' => ['required_with:filter.book_to', 'date', 'after:' . now(), 'date_format:Y-m-d H:i:s'],
            'filter.book_to' => ['required_with:filter.book_from', 'date', 'after:book_from', 'date_format:Y-m-d H:i:s'],
        ];
    }
}
