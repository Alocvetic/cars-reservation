<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $car_id
 * @property int $employee_id
 * @property string $book_from
 * @property string $book_to
 */
class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'employee_id',
        'book_from',
        'book_to',
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
