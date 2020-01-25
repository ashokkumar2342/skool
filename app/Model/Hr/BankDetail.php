<?php

namespace App\Model\Hr;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    protected $fillable=['id','employee_id','designation_id'];
    public $timestamps=false;

    public function designations($value='')
    {
         return $this->hasOne('App\Model\Hr\Designation','id','designation_id');
    }
    public function employees($value='')
    {
         return $this->hasOne('App\Model\Hr\Employee','id','employee_id');
    }
    public function banks($value='')
    {
         return $this->hasOne('App\Model\Hr\Bank','id','bank_id');
    }
}
