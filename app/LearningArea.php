<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LearningArea extends Model
{
    //
	public function transactions() {
		return $this->hasMany('App\Transaction','LAID','LAID');        
	} 
}
