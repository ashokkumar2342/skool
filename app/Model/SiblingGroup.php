<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SiblingGroup extends Model
{
      protected $fillable = [
       'student_id', 
       'group',
       
      
    ];

    Public function siblings(){
    	return $this->belongsTo('App\Student','group','id');  

    }
    Public function studentSiblings(){
    	return $this->hasOne('App\Student','id','student_id');  

    }  

    Public function getStudentSiblingArrId($student_id){
      try {
            $SiblingGroup =$this->where('student_id',$student_id)->first();
            if ($SiblingGroup==null) {
            	return null;
            }else{
            	return $this->where('group',$SiblingGroup->group)->pluck('student_id')->toArray();	
            }
         	

      } catch (Exception $e) {
        return $e;
      }

    }
}
