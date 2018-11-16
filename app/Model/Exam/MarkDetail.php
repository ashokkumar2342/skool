<?php

namespace App\Model\Exam;

use App\Model\Exam\ExamSchedule;
use Illuminate\Database\Eloquent\Model;

class MarkDetail extends Model
{
    protected $fillable = ['student_id','exam_schedule_id','marksobt','rank','description','percentile',''];
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
      	return $this->hasOne(ExamSchedule::class,'id','exam_schedule_id');
      }
}
