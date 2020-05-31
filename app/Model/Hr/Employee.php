<?php

namespace App\Model\Hr;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   protected $fillable=['id',];
   protected $table='employees';
   

    public function admins($value='')
    {
    	 return $this->hasOne('App\Model\Role','id','role_id');
    }
    public function departments($value='')
    {
    	 return $this->hasOne('App\Model\Hr\Department','id','department_id');
    }
    public function designations($value='')
    {
         return $this->hasOne('App\Model\Hr\Designation','id','designation_id');
    }
    public function groups($value='')
    {
    	 return $this->hasOne('App\Model\Hr\HrGroup','id','group_id');
    }
    public function experiences($value='')
    {
    	 return $this->hasOne('App\Model\Hr\Experience','id','experience_id');
    }
    public function genders($value='')
    {
         return $this->hasOne('App\Model\Gender','id','gender_id');
    }
}
