<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentFeeDetail extends Model
{
    protected $fillable = ['student_id','fee_structure_last_date_id','concession_id','fee_amount','concession_amount','paid','last_date','from_date','to_date','refundable'];

    public function feeStructureLastDates(){
    	return $this->hasOne('App\Model\FeeStructureLastDate','id','fee_structure_last_date_id');
        // return $this->hasManyThrough('App\Model\FeeStructure', 'App\Model\FeeStructureLastDate','fee_structure_id,fee_structure_last_date_id','id','id');

    }

    public function students(){
    	return $this->hasOne('App\Student','id','student_id');
    }
    
}
