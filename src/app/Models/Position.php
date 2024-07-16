<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
