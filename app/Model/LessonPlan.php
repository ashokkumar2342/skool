<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LessonPlan extends Model
{
     public function classes(){
        return $this->hasOne('App\Model\ClassType','id','class_id');
    }
     public function subjectTypes(){
        return $this->hasOne('App\Model\SubjectType','id','subject_id');
    }
}
