<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentAttendanceClass extends Model
{
	protected $table = 'student_attendances_class';
	 protected $fillable = ['class_id','section_id','date'];

   public function admins()
    {
    	return $this->hasOne('App\Admin','id','last_updated_by');
    }
    public function verifieds()
    {
    	return $this->hasOne('App\Admin','id','verified_by');
    }
}
 


 