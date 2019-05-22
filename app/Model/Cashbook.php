<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cashbook extends Model
{
      protected $fillable = [
         'student_id' ,
    ];

    public function getCashbookFeeByStudentId($student_id,$fromDate,$toDate){
    	return $this->where('student_id',$student_id) 
    				 ->whereBetween('receipt_date', [$fromDate, $toDate]) 
    				->where('status',1)
    				->get();
    } 
    public function getLastFeeByStudentId($student_id){
        return $this->where('student_id',$student_id)  
                    ->where('status',1)
                    ->orderBy('receipt_date','desc')
                    ->first();
    }
     public function getFeeByStudentId($student_id){
    	return $this->where('student_id',$student_id) 
    				// ->whereBetween('date', [$fromDate, $toDate]) 
    				->where('status',1)
    				->get();
    }
}
