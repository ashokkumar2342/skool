<?php

namespace App\Model\TimeTable;

use Illuminate\Database\Eloquent\Model;

class TeacherWorkingDays extends Model
{
    protected $fillable = [
	    'time_table_type_id', 'period_timeing_id','teacher_id','section_id','days_id','period_type'
	];
}
