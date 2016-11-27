<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    //
    public function participant() {
    	return $this->hasMany('App\Participant','DesID','DesID');
    }
}
