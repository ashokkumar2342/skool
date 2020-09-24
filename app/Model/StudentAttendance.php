<?php

namespace App\Model;

use App\Student;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    
    protected $fillable = ['student_id'];

    // public function student(){
    //     return $this->hasOne(Student::class);
    // }

    public function attendance(){
        return $this->hasOne('App\Model\AttendanceType','id','attendance_type_id');
    }
    public function student(){
        return $this->hasOne('App\Student','id','student_id');
    }
    public function getStudentAttendance($class_id,$section_id,$date){
        try {
            return $this->where('class_id',$class_id)
            ->where('section_id',$section_id)
            ->where('date',$date)
            ->get();
        } catch (Exception $e) {
            
        }
    }
    

}
