<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeeStructureLastDate extends Model
{
  
     protected $fillable = [
       
       'fee_structure_id', 
       'academic_year_id', 
       'for_session_month_id',       
       'amount',       
       'last_date',        
            
    ];

    public function feeStructures(){
    	return $this->hasOne('App\Model\FeeStructure','id','fee_structure_id');
    }

    public function feeStructuresMany(){
      return $this->hasMany('App\Model\FeeStructure','id','fee_structure_id');
    }
    

    public function academicYears(){
    	return $this->hasOne('App\Model\AcademicYear','id','academic_year_id');
    }
    public function forSessionMonths(){
    	return $this->hasOne('App\Model\ForSessionMonth','id','for_session_month_id');
    }
}
