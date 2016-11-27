<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
	public function transactions() {
		return $this->hasMany('App\Transaction','LID','LID');        
	} 
}
