<?php

namespace App\Model\Hr;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalaryStructure extends Model
{
    protected $fillable=['id','employee_id'];
    public $timestamps=false;
    

    public function employees($value='')
    {
         return $this->hasOne('App\Model\Hr\Employee','id','employee_id');
    }
    public function allowances($value='')
    {
         return $this->hasOne('App\Model\Hr\Allowance','id','allowance_id');
    }
}
