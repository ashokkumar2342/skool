<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
	
    protected $fillable = ['subject_type_id' , 'student_id' , 'session_id'    ];


    Public function SubjectTypes(){
    	return $this->hasOne('App\model\SubjectType','id','subject_type_id');
    	
    }  Public function Isoptionals(){
    	return $this->hasOne('App\model\Isoptional','id','isoptional_id');
    	
    } 


}
