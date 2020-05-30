<?php

namespace App\Model\TimeTable;

use Illuminate\Database\Eloquent\Model;

class TeacherClassAssign extends Model
{
    protected $fillable = [
	    'class_id','id','teacher_id',
	];
	public $timestamps=false;

	 Public function subjectType(){
     	return $this->hasOne('App\Model\SubjectType','id','subject_id');
     }
}
