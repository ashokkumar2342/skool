<?php

namespace App\Model\Exam;

use Illuminate\Database\Eloquent\Model;

class ClassTestDetail extends Model
{
  protected $fillable = ['student_id','class_test_id','marksobt','any_remarks'];
   public function classes(){
       return $this->hasOne('App\Model\ClassType','id','class_id');
   }
    public function sectionTypes(){
       return $this->hasOne('App\Model\SectionType','id','section_id');
   }

   Public function subjects(){
    	return $this->hasOne('App\Model\SubjectType','id','subject_id');
    }

    Public function students(){
    	return $this->hasOne('App\Student','id','student_id');
    }

      Public function classTests(){
    	return $this->hasOne('App\Model\ClassTest','id','class_test_id');
    }
}
