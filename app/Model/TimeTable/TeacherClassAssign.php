<?php

namespace App\Model\TimeTable;

use Illuminate\Database\Eloquent\Model;

class TeacherClassAssign extends Model
{
    protected $fillable = [
	    'class_id','id','teacher_id',
	];
	protected $table='class_teacher';
	 

	 Public function sections(){
     	return $this->hasOne('App\Model\Section','id','section_id');
     }
     Public function employees(){
     	return $this->hasOne('App\Model\Hr\Employee','id','staff_id');
     }
}
