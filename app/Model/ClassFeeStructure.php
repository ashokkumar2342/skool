<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassFeeStructure extends Model
{
  

	   protected $fillable = [
       
       'fee_structure_id', 
       'class_id', 
       'is_applicable',  
    ];
  
    protected $table = 'class_feestructures';

    public function feeStructures(){
    	return $this->hasOne('App\Model\FeeStructure','id','fee_structure_id');
    }

    public function classess(){
    	return $this->hasOne('App\Model\ClassType','id','class_id');
    }
    
}
