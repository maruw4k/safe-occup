<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{

    protected $fillable = [
        'name', 'map_id',
    ];

    public function units()
    {
        return $this->hasMany('App\Unit');
    }

    public function map()
    {
        return $this->belongsTo('App\Map');
    }
}
