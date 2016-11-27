<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //
    public function divisions() {
        return $this->hasMany('App\Division','DivID','DivID');        
    }

    public function participants() {
    	return $this->hasMany('App\Participant','RegID','RegID');
    }

}
