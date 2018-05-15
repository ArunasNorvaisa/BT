<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radar extends Model
{
    protected $table = 'radars';

    public function getSpeed()
    {
        return $this->attributes['distance'] / $this->attributes['time'] * 3.6;
    }
}
