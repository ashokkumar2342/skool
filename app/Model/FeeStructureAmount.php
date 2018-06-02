<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeeStructureAmount extends Model
{
     protected $fillable = [   
						       'fee_structure_id', 
						       'academic_year_id',           
						       'amount', 
						    ];

    public function feeStructures(){
    	return $this->hasOne('App\Model\FeeStructure','id','fee_structure_id');
    }
    public function academicYears(){
    	return $this->hasOne('App\Model\AcademicYear','id','academic_year_id');
    }
}
