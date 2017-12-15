<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = [
        'name',
    ];

    public function officers()
    {
        return $this->hasMany('App\Officer');
    }

    public function cars()
    {
        return $this->hasMany('App\Car');
    }

    public function units()
    {
        return $this->hasMany('App\Unit');
    }
}
