<?php

namespace App\Model\Hr;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   protected $fillable=['id',];
    public $timestamps=false;

    public function admins($value='')
    {
    	 return $this->hasOne('App\Admin','id','user_id');
    }
    public function departments($value='')
    {
    	 return $this->hasOne('App\Model\Hr\Department','id','department_id');
    }
    public function groups($value='')
    {
    	 return $this->hasOne('App\Model\Hr\HrGroup','id','group_id');
    }
    public function experiences($value='')
    {
    	 return $this->hasOne('App\Model\Hr\Experience','id','experience');
    }
}
