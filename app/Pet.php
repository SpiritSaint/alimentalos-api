<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pet
 * @package App
 */
class Pet extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'born_at',
        'user_id',
    ];

    public function photos()
    {
        return $this->belongsToMany('App\Photo')
            ->withTimestamps();
    }
}
