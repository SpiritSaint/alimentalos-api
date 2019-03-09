<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Place
 * @package App
 */
class Place extends Model
{
    /**
     * @var array 
     */
    protected $with = ['photos'];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'latitude',
        'longitude',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function photos()
    {
        return $this->belongsToMany('App\Photo')
            ->withTimestamps();
    }
}
