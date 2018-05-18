<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentSiblingInfo extends Model
{
	
      protected $fillable = [
       'student_id', 
       'student_sibling_id',
       
      
    ];

    Public function siblings(){
    	return $this->belongsTo('App\Student','student_sibling_id','id');  

    }
}
