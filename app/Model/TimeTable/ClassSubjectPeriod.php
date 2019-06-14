<?php

namespace App\Model\TimeTable;

use Illuminate\Database\Eloquent\Model;

class ClassSubjectPeriod extends Model
{
    protected $fillable = [
	    'class_id','section_id','subject_id','period_duration','on_of_period'
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
}
