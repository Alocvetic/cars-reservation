<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

/**
 * @property int $id
 * @property string $title
 * @property int $position_id
 */
class Employee extends Model
{
    use HasFactory;

    public const DEF_COUNT = 10;

    protected $fillable = [
        'title',
        'position_id'
    ];

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
