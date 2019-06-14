<?php

namespace App\Model\TimeTable;

use Illuminate\Database\Eloquent\Model;

class TeacherSubjectClass extends Model
{
    protected $fillable = [
	    'teacher_id', 'canteach','class_id','section_id','subject_id','no_of_period','no_of_duration'
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
        return $this->hasOne('App\Model\Library\TeacherFaculty','id','teacher_id');
     }
}
