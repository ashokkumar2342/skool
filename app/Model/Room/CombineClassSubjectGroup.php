<?php

namespace App\Model\Room;

use Illuminate\Database\Eloquent\Model;

class CombineClassSubjectGroup extends Model
{
    protected $fillable = [
	    'subject_id', 'group_no','class_id'
	];

	 Public function classType(){
     	return $this->hasOne('App\Model\ClassType','id','class_id');
     }
     public function roomType()
    {
    	return $this->hasOne('App\Model\Room\RoomType','id','room_id');
    } 
     Public function sectionTypes(){
     	return $this->hasOne('App\Model\SectionType','id','section_id');
     }
     Public function subjectType(){
     	return $this->hasOne('App\Model\SubjectType','id','subject_id');
     }
}
