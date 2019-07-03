<?php

namespace App\Model\TimeTable;

use Illuminate\Database\Eloquent\Model;

class TeacherWorkingDays extends Model
{
    protected $fillable = [
	    'time_table_type_id', 'period_timeing_id','teacher_id','section_id','days_id','period_type'
	];

	 Public function classTypes(){
     	return $this->belongsTo('App\Model\ClassType','class_id');
     }

    Public function subjectType(){
     	return $this->hasOne('App\Model\SubjectType','id','subject_id');
     }
      Public function sectionTypes(){
     	return $this->hasOne('App\Model\SectionType','id','section_id');
     }
     Public function teacherFaculty(){
        return $this->hasOne('App\Model\LibTrary\TeacherFaculty','id','teacher_id');
     } 
     Public function dayType(){
        return $this->hasOne('App\Model\TimeTable\DaysType','id','days_id');
     }
     Public function periodTiming(){
        return $this->hasOne('App\Model\TimeTable\PeriodTiming','id','period_timeing_id');
     }
}
