<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name', 'station_id',
    ];

    public function station()
    {
        return $this->belongsTo('App\Station');
    }

    public function unit()
    {
        return $this->hasOne('App\Unit');
    }
}
