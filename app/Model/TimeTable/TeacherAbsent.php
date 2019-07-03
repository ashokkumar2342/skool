<?php

namespace App\Model\TimeTable;

use Illuminate\Database\Eloquent\Model;

class TeacherAbsent extends Model
{
     Public function teacherFaculty(){
        return $this->hasOne('App\Model\Library\TeacherFaculty','id','teacher_id');
     } 
     Public function dayType(){
        return $this->hasOne('App\Model\TimeTable\DaysType','id','day_id');
     }
     Public function periodTiming(){
        return $this->hasOne('App\Model\TimeTable\PeriodTiming','id','period_id');
     }
}
