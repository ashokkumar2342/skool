<?php

namespace App\Model\Hr;

use Illuminate\Database\Eloquent\Model;

class SalarySetting extends Model
{
    protected $fillable=['id',];
    public $timestamps=false;

    public function designations($value='')
    {
         return $this->hasOne('App\Model\Hr\Designation','id','designation_id');
    }
    public function employees($value='')
    {
         return $this->hasOne('App\Model\Hr\Employee','id','employee_id');
    }
    public function Payheads($value='')
    {
         return $this->hasOne('App\Model\Hr\Payhead','id','Pay_head_type_id');
    }
    

}
