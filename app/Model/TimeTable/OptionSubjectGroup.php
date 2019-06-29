<?php

namespace App\Model\TimeTable;

use Illuminate\Database\Eloquent\Model;

class OptionSubjectGroup extends Model
{
    protected $fillable = [
	    'class_id','section_id','subject_id','group_no'
	];

	 Public function subjectType(){
     	return $this->hasOne('App\Model\SubjectType','id','subject_id');
     }
}
