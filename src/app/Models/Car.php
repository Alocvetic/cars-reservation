<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public const DEF_COUNT = 9;
    public const DEF_MODELS = [
        'Toyota Corolla',
        'Lada Vesta',
        'Skoda Octavia',
        'Nissan Sunny',
        'Renault Sandero',
        'kia Niro',
        'Aurus Senat',
    ];

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
