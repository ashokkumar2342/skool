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
    public function updateArr($updateArr,$id){
        return $this->where('id',$id)->update($updateArr);
    }

    public function getFeeDetailsNextByStudentId($student_id){
    	return $this->where('student_id',$student_id)->get();
    }
    public function getFeeDetailsByUpTodate($toDate,$student_id){
        return $this->
              join('fee_structure_last_dates','student_fee_details.fee_structure_last_date_id', '=', 'fee_structure_last_dates.id')
              ->join('fee_structures', 'fee_structures.id', '=', 'fee_structure_last_dates.fee_structure_id')
              ->where('student_id',$student_id)
              ->where('student_fee_details.last_date', '<=',$toDate)
              ->where('student_fee_details.paid', '=',0) 
              ->get(); 
    }

    public function getFeeDetailsByToDateStudentId($toDate,$student_id){
        return $this 
              ->where('student_id',$student_id)
              ->where('student_fee_details.last_date', '<=',$toDate)
              ->where('student_fee_details.paid', '=',0) 
              ->get(); 
    }
    public function getFeeDetailsArrIdByToDateStudentId($toDate,$student_id){
        return $this 
              ->where('student_id',$student_id)
              ->where('student_fee_details.last_date', '<=',$toDate)
              ->where('student_fee_details.paid', '=',0) 
              ->pluck('id')->toArray();
    }
    public function getFeeDetailsByArrId($arr_id){
        return $this-> join('fee_structure_last_dates','student_fee_details.fee_structure_last_date_id', '=', 'fee_structure_last_dates.id')
              ->join('fee_structures', 'fee_structures.id', '=', 'fee_structure_last_dates.fee_structure_id') 
              ->whereIn('student_fee_details.id',$arr_id)
              ->get(); 

    }

    
    
}
