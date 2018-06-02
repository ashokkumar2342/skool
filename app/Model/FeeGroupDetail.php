<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeeGroupDetail extends Model
{
     protected $fillable = [
       
       'fee_structure_id', 
        
            
            
            
            
    ];

    public function feeGroups(){
    	return $this->hasOne('App\Model\FeeGroup','id','fee_group_id');
    }

    
}
