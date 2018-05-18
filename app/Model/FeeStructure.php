<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
   
    protected $fillable = [
      
      'code', 
      'name', 
      'fee_account_id',       
      'fine_scheme_id',       
      'is_refundable',        
           
   ];

   public function fineSchemes(){
   	return $this->hasOne('App\Model\FineScheme','id','fine_scheme_id');
   }

   public function feeAccounts(){
   	return $this->hasOne('App\Model\FeeAccount','id','fee_account_id');
   }
}
