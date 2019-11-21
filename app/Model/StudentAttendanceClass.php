<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentAttendanceClass extends Model
{
	protected $table = 'student_attendances_class';
	 protected $fillable = ['class_id','section_id','date'];

   public function templateType()
    {
    	return $this->hasOne('App\Model\Sms\TemplateType','id','template_type_id');
    }
}
 


 