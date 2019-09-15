<?php

namespace App\Model\Exam;

use Illuminate\Database\Eloquent\Model;

class ExamTerm extends Model
{
    public function academicYear(){
        return $this->hasOne('App\Model\AcademicYear','id','academic_year_id');
    }
}
