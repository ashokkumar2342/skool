<?php

namespace App\Model\TimeTable;

use Illuminate\Database\Eloquent\Model;

class ManualTimeTabl extends Model
{
     Public function subjectType(){
     	return $this->hasOne('App\Model\SubjectType','id','subject_id');
     }
      Public function classTypes(){
     	return $this->belongsTo('App\Model\ClassType','class_id');
     } 
    
      Public function sectionTypes(){
     	return $this->hasOne('App\Model\SectionType','id','section_id');
     }
     Public function teacherFaculty(){
        return $this->hasOne('App\Model\Library\TeacherFaculty','id','teacher_id');
     } 
     Public function dayType(){
        return $this->hasOne('App\Model\TimeTable\DaysType','id','day_id');
     }
     Public function periodTiming(){
        return $this->hasOne('App\Model\TimeTable\PeriodTiming','id','period_id');
     }
}
