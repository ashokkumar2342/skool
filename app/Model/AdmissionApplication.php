<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdmissionApplication extends Model
{
    protected $fillable=[
    	'id','student_id',];
   public $timestamps = false;
    	public function students($value='')
    {
    	return $this->hasOne('App\Student','id','student_id'); 
    }

    	public function getStudentIdByApplicationNo($sibling_application_no)
		{
		      try {
		           return  $this->find($sibling_application_no);
		        } catch (Exception $e) {
		            return $e;
		        }
    	}
}
