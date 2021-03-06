<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    protected $table = 'drivers';
    protected $primaryKey = 'driverId';

    protected $fillable = [
        'name',
        'city',
    ];
}
