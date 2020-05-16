<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MappingBankAccount extends Model
{
   protected $fillable=['id',];
   public $timestamps=false;
   
    public function Banks(){
        return $this->hasOne('App\Model\Hr\Bank','id','bank_id');
    } 
}
