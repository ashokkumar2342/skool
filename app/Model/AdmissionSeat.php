<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdmissionSeat extends Model
{
   protected $fillable=['id',];
   public function academicYears(){
    	return $this->hasOne('App\Model\AcademicYear','id','academic_year_id');
    }
    public function classes(){
        return $this->hasOne('App\Model\ClassType','id','class_id');
    } 
}
