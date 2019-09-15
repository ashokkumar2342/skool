<?php

namespace App\Model\Exam;

use App\Model\Exam\ExamTerm;
use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    public function academicYear(){
        return $this->hasOne('App\Model\AcademicYear','id','academic_year_id');
    } public function classes(){
        return $this->hasOne('App\Model\ClassType','id','class_id');
    }
     public function examTerms(){
        return $this->hasOne(ExamTerm::class,'id','exam_term_id');
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
