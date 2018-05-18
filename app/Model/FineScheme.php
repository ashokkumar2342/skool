<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FineScheme extends Model
{
    
      protected $fillable = [
      
        'code', 
        'name', 
        'day_after1',       
        'day_aftet2',       
        'fine_amount1',        
        'fine_amount2',         
        'fine_amount3',       
        'fine_period_id',        
     ];

     public function finePeriods(){
     	return $this->hasOne('App\Model\FinePeriod','id','fine_period_id');
     }
}
