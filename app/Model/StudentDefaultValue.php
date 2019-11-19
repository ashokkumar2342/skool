<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentDefaultValue extends Model
{
    protected $fillable = [
        'user_id', 'class_id', 'section_id',
    ];
      public function academicYears(){
        return $this->hasOne('App\Model\AcademicYear','id','academic_year_id');
    }
    public function genders(){
        return $this->hasOne('App\Model\Gender','id','gender_id');
    }
    public function religions(){
        return $this->hasOne('App\Model\Religion','id','religion_id');
    }
    public function categories(){
        return $this->hasOne('App\Model\Category','id','category_id');
    }
     public function studentStatus(){
        return $this->hasOne('App\Model\studentStatus','id','student_status_id');
    }
    public function houses(){
        return $this->hasOne('App\Model\House','id','house_id');
    }
}
