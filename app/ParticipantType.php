<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantType extends Model
{
    //
	public function transactions() {
		return $this->hasMany('App\Transaction','PTID','PTID');        
	} 
}
