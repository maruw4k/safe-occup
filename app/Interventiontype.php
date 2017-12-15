<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interventiontype extends Model
{
    protected $fillable = [
        'name',
    ];

    public function interventions()
    {
        return $this->hasMany('App\Intervention' ,'interventionType_id');
    }
}
