<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //
    public function transactions() {
        return $this->hasMany('App\Transaction','PIN','PIN');        
    } 

    public function division() {
    	return $this->belongsTo('App\Division','DivID','DivID');
    }

    public function designation() {
    	return $this->belongsTo('App\Designation','DesID','DesID');
    }

    public function region() {
        return $this->belongsTo('App\Region','RegID','RegID');
    }
}
