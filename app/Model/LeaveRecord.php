<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LeaveRecord extends Model
{
    protected $table= 'leave_record'; 
    protected $fillable=[
        'id',];  
    public function academicYear()
    {
    	 return $this->hasOne('App\Model\AcademicYear','id','year_id');
    }
    public function leaveTypes()
    {
    	 return $this->hasOne('App\Model\leaveTypeStudent','id','leave_id');
    }
    public function students()
    {
    	 return $this->hasOne('App\Student','id','student_id');
    }
    public function admins()
    {
         return $this->hasOne('App\Admin','id','action_by');
    }
}
