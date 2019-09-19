<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentDefaultValue extends Model
{
    protected $fillable = [
        'id', 'class_id', 'section_id',
    ];
      public function academicYears(){
        return $this->hasOne('App\Model\Gender','id','year');
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
}
