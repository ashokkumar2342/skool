<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentProfileReport extends Model
{
    public function student(){
        return $this->hasOne('App\Student','id','student_id');
    }
    public function studentRegistration(){
        return $this->hasOne('App\Student','id','registration_no');
    }
    public function classTypes(){
        return $this->hasOne('App\Model\ClassType','id','class_id');
    }
    public function sectionTypes(){
        return $this->hasOne('App\Model\SectionType','id','section_id');
    }
    public function reportFor(){
        return $this->hasOne('App\Model\ReportFor','id','report_for_id');
    }
}
