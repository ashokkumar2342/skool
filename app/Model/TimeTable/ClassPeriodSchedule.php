<?php

namespace App\Model\TimeTable;

use Illuminate\Database\Eloquent\Model;

class ClassPeriodSchedule extends Model
{
	protected $fillable = [
	    'time_table_type_id', 'period_timeing_id','class_id','section_id','days_id','period_type'
	];
   public function periodTiming(){
    	return $this->hasOne('App\Model\TimeTable\PeriodTiming','id','period_timeing_id');
    }
}
