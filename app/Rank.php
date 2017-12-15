<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = [
        'name',
    ];

    public function officers()
    {
        return $this->hasMany('App\Officer');
    }
}
