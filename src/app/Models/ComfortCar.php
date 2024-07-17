<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsToMany, HasMany};

/**
 * @property int $id
 * @property string $title
 */
class ComfortCar extends Model
{
    use HasFactory;

    public const DEF_COUNT = 4;
    public const DEF_VALUES = [
        'Эконом',
        'Комфорт',
        'Бизнес',
        'Премиум',
    ];

    protected $fillable = [
        'title'
    ];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function positions(): BelongsToMany
    {
        return $this->belongsToMany(Position::class, 'comfort_car_position', 'comfort_car_id', 'position_id');
    }
}
