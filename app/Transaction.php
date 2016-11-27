<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public function participant() 
    {
        return $this->belongsTo('App\Participant','PIN','PIN');
    }
    
    public function event() 
    {
        return $this->belongsTo('App\Event','EventID','EventID');
    }
    
    public function learning_area() 
    {
        return $this->belongsTo('App\LearningArea','LAID','LAID');        
    }
    
    public function language() 
    {
        return $this->belongsTo('App\Language','LID','LID');
    }
    
    public function participant_type() 
    {
        return $this->belongsTo('App\ParticipantType','PTID','PTID');
    }

    public function user()
    {
        return $this->belongsTo('App\User','UserID','UserID');
    }
}
