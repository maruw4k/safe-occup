<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'car_id', 'station_id', 'zone_id', 'position',
    ];

    public function station()
    {
        return $this->belongsTo('App\Station');
    }

    public function car()
    {
        return $this->belongsTo('App\Car');
    }

    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }

    public function interventions()
    {
        return $this->hasMany('App\Intervention');
    }

    public function officers()
    {
        return $this->hasMany('App\Officer');
    }
}
