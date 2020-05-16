<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MappingBankAccount extends Model
{
   protected $fillable=['id',];
   public $timestamps=false;
   
    public function FeeAccount(){
        return $this->hasOne('App\Model\FeeAccount','id','fee_account_id');
    } 
    public function SchoolBankDetail(){
        return $this->hasOne('App\Model\SchoolBankDetail','id','school_bank_details_id');
    } 
}
