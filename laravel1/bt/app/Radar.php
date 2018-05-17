<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Radar;

class Radar extends Model
{
    protected $table = 'radars';

    protected $fillable = [
        'date',
        'number',
        'distance',
        'time',
    ];

    public function getSpeed()
    {
        return round(($this->attributes['distance'] / $this->attributes['time'] * 3.6), 1);
    }
}
