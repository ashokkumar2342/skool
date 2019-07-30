<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportRequest extends Model
{
    protected $fillable = [
	   'student_id', 
	   'class_id', 
	   'section_id', 
	   'registration_no', 
	   'report_type_id', 
	   'status', 
	];
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
}
