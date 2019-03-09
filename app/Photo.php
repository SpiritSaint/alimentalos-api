<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Photo
 * @package App
 */
class Photo extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'url',
    ];
}
