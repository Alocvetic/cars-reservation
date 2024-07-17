<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $title
 */
class ComfortCar extends Model
{
    use HasFactory;

    public const COUNT_FACTORY = 4;

    protected $fillable = [
        'title'
    ];

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class);
    }

    public function positions(): BelongsToMany
    {
        return $this->belongsToMany(Position::class, 'comfort_car_position', 'comfort_car_id', 'position_id');
    }
}
