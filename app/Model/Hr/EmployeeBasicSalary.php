<?php

namespace App\Model\Hr;

use Illuminate\Database\Eloquent\Model;

class EmployeeBasicSalary extends Model
{
    protected $fillable=['id','employee_id'];
    public $timestamps=false;
    public $table='employee_basic_salary';

    public function employees($value='')
    {
         return $this->hasOne('App\Model\Hr\Employee','id','employee_id');
    }
}
