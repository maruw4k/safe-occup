<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $fillable = [
        'name',
    ];

    public function zones()
    {
        return $this->hasMany('App\Zone');
    }
}
