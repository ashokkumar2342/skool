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
    public function sendBy()
    {
        return $this->hasOne('App\Admin','id','sms_sent_by');
    }
    public function classes()
    {
        return $this->hasOne('App\Model\ClassType','id','class_id');
    }
    public function sectionTypes()
    {
        return $this->hasOne('App\Model\SectionType','id','section_id');
    }
}
 


 