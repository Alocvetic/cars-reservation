<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $register_number
 * @property string $model
 * @property int $comfort_car_id
 * @property int $driver_id
 * @property bool $is_access
 * @property bool $is_booked
 */
class Car extends Model
{
    use HasFactory;

    public const COUNT_FACTORY = 9;

    protected $fillable = [
        'register_number',
        'model',
        'comfort_car_id',
        'driver_id',
        'is_access',
        'is_booked',
    ];

    public function comfortCar(): HasOne
    {
        return $this->hasOne(ComfortCar::class);
    }

    public function driver(): HasOne
    {
        return $this->hasOne(Driver::class);
    }
}
