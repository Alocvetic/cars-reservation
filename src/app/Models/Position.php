<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $title
 */
class Position extends Model
{
    use HasFactory;

    public const COUNT_FACTORY = 4;

    protected $fillable = [
        'title'
    ];

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class);
    }

    public function comfortCars(): BelongsToMany
    {
        return $this->belongsToMany(ComfortCar::class, 'comfort_car_position', 'position_id', 'comfort_car_id');
    }
}
