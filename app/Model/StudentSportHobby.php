<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentSportHobby extends Model
{
	
     protected $fillable = [
       'student_id', 
       'sports_activity_name', 
      'session_id',
      
    ];

   public function sessions(){
       return $this->hasOne('App\Model\SessionDate','id','session_id');
   } 
}
