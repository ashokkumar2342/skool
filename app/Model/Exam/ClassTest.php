<?php

namespace App\Model\Exam;

use Illuminate\Database\Eloquent\Model;

class ClassTest extends Model
{
    public function academicYear(){
        return $this->hasOne('App\Model\AcademicYear','id','academic_year_id');
    } public function classes(){
        return $this->hasOne('App\Model\ClassType','id','class_id');
    }
    public function students(){
        return $this->hasOne('App\Student','id','student_id');
    }
     public function sectionTypes(){
        return $this->hasOne('App\Model\SectionType','id','section_id');
    }

    Public function subjects(){
     	return $this->hasOne('App\Model\SubjectType','id','subject_id');
     }
     Public function grade(){
        return $this->hasOne('App\Model\Exam\Grade','id','grade');
     }
}
