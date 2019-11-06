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

    public function getSiblingByStudentId($id)
    {
        try {
          $studentSibling=SiblingGroup::where('student_id',$id)->count();
                   if ($studentSibling!=0) {
                     $studentSiblingId=SiblingGroup::where('student_id',$id)->first();
                  return $studentSiblingInfos=SiblingGroup::
                                                             where('group',$studentSiblingId->group)
                                                           ->where('student_id','!=',$id)->get();
                   }else{
                    return  array();
                   }  
        } catch (Exception $e) {
            return $e;
        }

    }
}
