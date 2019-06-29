<?php

namespace App\Model\Room;

use Illuminate\Database\Eloquent\Model;

class SubjectWiseRoom extends Model
{
     public function roomType()
    {
    	return $this->hasOne('App\Model\Room\RoomType','id','room_id');
    } 
      
     Public function subjectType(){
     	return $this->hasOne('App\Model\SubjectType','id','subject_id');
     }
}
