<?php

namespace App\Model\TimeTable;

use Illuminate\Database\Eloquent\Model;

class OptionSubjectGroup extends Model
{
    protected $fillable = [
	    'class_id','section_id','subject_id','group_no'
	];
}
