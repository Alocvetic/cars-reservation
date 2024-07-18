<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

/**
 * @property int $id
 * @property string $register_number
 * @property string $model
 * @property int $comfort_car_id
 * @property int $driver_id
 * @property bool $is_access
 */
class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'register_number',
        'model',
        'comfort_car_id',
        'driver_id',
        'is_access',
    ];

    public function comfortCar(): BelongsTo
    {
        return $this->belongsTo(ComfortCar::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
