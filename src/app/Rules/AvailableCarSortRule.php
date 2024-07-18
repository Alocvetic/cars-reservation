<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AvailableCarSortRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $carColsAsc = ['model', 'comfort'];
        $carColsDesc = array_map(function ($key) {
            return "-$key";
        }, $carColsAsc);

        $carCols = array_merge($carColsAsc, $carColsDesc);

        $values = explode(',', $value);
        foreach ($values as $sortValue) {
            if (!in_array($sortValue, $carCols)) {
                $fail('Недопустимое поле: ' . $sortValue);
            }
        }
    }
}
