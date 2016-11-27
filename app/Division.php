<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    //
    public function region() {
        return $this->belongsTo('App\Region');
    }

    public function participants() {
    	return $this->hasMany('App\Participant','DivID','DivID');
    }
}
