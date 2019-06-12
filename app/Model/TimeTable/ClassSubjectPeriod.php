<?php

namespace App\Model\TimeTable;

use Illuminate\Database\Eloquent\Model;

class ClassSubjectPeriod extends Model
{
    protected $fillable = [
	    'class_id','section_id','subject_id','period_duration','on_of_period'
	];
	 Public function subjectType(){
     	return $this->hasOne('App\Model\SubjectType','id','subject_id');
     }
     Public function teacherFaculty(){
     	return $this->hasOne('App\Model\Library\TeacherFaculty','id','teacher_id');
     }
}
