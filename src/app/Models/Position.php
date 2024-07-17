<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 */
class Position extends Model
{
    use HasFactory;

    public const DEF_COUNT = 4;
    public const DEF_VALUES = [
        'Менеджер',
        'Директор',
        'Руководитель',
        'Певец',
    ];

    protected $fillable = [
        'title'
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function comfortCars(): BelongsToMany
    {
        return $this->belongsToMany(ComfortCar::class, 'comfort_car_position', 'position_id', 'comfort_car_id');
    }
}
