<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $car_id
 * @property Carbon $book_from
 * @property Carbon $book_to
 */
class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'book_from',
        'book_to',
    ];
}
