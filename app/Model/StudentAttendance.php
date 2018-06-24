<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    
    protected $fillable = ['student_id'];

    public function student(){
        return $this->hasOne(Student::class);
    }
    public function attendance(){
        return $this->hasOne('App\AttendanceType','id','attendance_type_id');
    }

}
