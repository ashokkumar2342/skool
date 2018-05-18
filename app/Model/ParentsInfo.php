<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ParentsInfo extends Model
{
    
	protected $fillable = [
        'student_id','name','doa','education','email','income_id','mobile','occupation','office_address','relation_type_id'
           ];

    Public function relationType(){

    	return $this->hasOne('App\model\GuardianRelationType','id','relation_type_id');
    } 
     Public function incomes(){
    	return $this->hasOne('App\model\IncomeRange','id','income_id');
    	
    }      
 
}
