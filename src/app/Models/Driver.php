<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 */
class Driver extends Model
{
    use HasFactory;

    public const COUNT_FACTORY = 8;

    protected $fillable = [
        'title'
    ];
}
