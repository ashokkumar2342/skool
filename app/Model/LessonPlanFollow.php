<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LessonPlanFollow extends Model
{
     public function classes(){
        return $this->hasOne('App\Model\ClassType','id','class_id');
    } 
    public function sectionTypes(){
        return $this->hasOne('App\Model\ClassType','id','section_id');
    }
     public function subjectTypes(){
        return $this->hasOne('App\Model\SubjectType','id','subject_id');
    }
    public function lessonPlan(){
        return $this->hasOne('App\Model\LessonPlan','id','lesson_plan_id');
    }
    public function teacherFaculty(){
        return $this->hasOne('App\Model\Library\TeacherFaculty','id','teacher_id');
    }
}
