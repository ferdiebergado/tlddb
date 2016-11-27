<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function transactions () {

    	return $this->hasMany('App\Transaction','UserID','UserID');
    	
    }

    public function logins () {

    	return $this->hasMany('App\Login','UserID','UserID');
    }
}
