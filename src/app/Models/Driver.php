<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $title
 */
class Driver extends Model
{
    use HasFactory;

    public const DEF_COUNT = 8;

    protected $fillable = [
        'title'
    ];

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class);
    }
}
