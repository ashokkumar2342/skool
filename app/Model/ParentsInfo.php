<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ParentsInfo extends Model
{
    
	protected $fillable = [
        'student_id','name','doa','education','email','income_id','mobile','occupation','office_address','relation_type_id'
           ];

    Public function relationType(){

    	return $this->hasOne('App\Model\GuardianRelationType','id','relation_type_id');
    } 
     Public function incomes(){
    	return $this->hasOne('App\Model\IncomeRange','id','income_id');
    	
    }  

    Public function profetions(){
        return $this->hasOne('App\Model\Profession','id','occupation'); 
    }    
 
}
