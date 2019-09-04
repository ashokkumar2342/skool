<?php

namespace App\Model\Exam;

use Illuminate\Database\Eloquent\Model;

class TeacherRemark extends Model
{
    public function academicYears()
    {
    	return $this->hasOne('App\Model\AcademicYear','id','academic_year_id'); 
    }
    public function admins()
    {
    	return $this->hasOne('App\Admin','id','teacher_id');  
    }
    public function students()
    {
    	return $this->hasOne('App\Student','id','student_id'); 
    }
    public function subjects()
    {
    	return $this->hasOne('App\Model\SubjectType','id','subject_id');  
    }
}
