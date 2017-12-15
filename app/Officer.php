<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $fillable = [
        'user_id', 'rank_id', 'station_id', 'unit_id', 'drivers_licence',
    ];

    public function rank()
    {
        return $this->belongsTo('App\Rank');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function station()
    {
        return $this->belongsTo('App\Station');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
