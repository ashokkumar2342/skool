<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CertificateType extends Model
{
	 
    public function students(){
    	return $this->hasOne('App\Student','id','student_id');
    }
    public function academicYear(){
    	return $this->hasOne('App\Model\AcademicYear','id','academic_year_id');
    }
}
