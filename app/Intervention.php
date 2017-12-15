<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    protected $fillable = [
        'description', 'interventionType_id', 'unit_id', 'date', 'finished',
    ];

    public function interventionType()
    {
        return $this->belongsTo('App\Interventiontype', 'interventionType_id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
