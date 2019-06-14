<?php

namespace App\Model\TimeTable;

use Illuminate\Database\Eloquent\Model;

class PeriodTiming extends Model
{
    public function timeTableType(){
    	return $this->hasOne('App\Model\TimeTable\timeTableType','id','time_table_type_id');
    }
}
