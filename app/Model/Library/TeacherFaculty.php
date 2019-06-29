<?php

namespace App\Model\Library;

use Illuminate\Database\Eloquent\Model;

class TeacherFaculty extends Model
{
    Public function classTypes(){
     	return $this->belongsTo('App\Model\ClassType','class_id');
     }

    Public function subjectTypes(){
     	return $this->hasOne('App\Model\SubjectType','id','subject_id');
     }
    Public function sectionTypes(){
     	return $this->hasOne('App\Model\SectionType','id','section_id');
     }
}
