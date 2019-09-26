<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentPerentDetail extends Model
{
    protected $fillable = [
        'relation_id', 'student_id', 
    ];

    Public function getParentArrId($student_id,$sibling_student_id){
      try {
            $arr_id= $this->where('student_id',$student_id)->pluck('id')->toArray(); 
            $sibling_arr_id= $this->where('student_id',$sibling_student_id)->pluck('id')->toArray(); 
            foreach ($arr_id as $key => $id) {
            	 $studentParentDetail=StudentPerentDetail::find($id);

            	 $studentParentDetails=StudentPerentDetail::firstOrNew(['relation_id' => $studentParentDetail->relation_id, 'student_id' => $sibling_student_id]);
            	 $studentParentDetails->student_id=$sibling_student_id; 
            	 $studentParentDetails->perent_info_id=$studentParentDetail->perent_info_id;
            	 $studentParentDetails->relation_id=$studentParentDetail->relation_id;
            	 $studentParentDetails->save();
            }

            foreach ($sibling_arr_id as $key => $id) {
            	 $studentParentDetail=StudentPerentDetail::find($id);

            	 $studentParentDetails=StudentPerentDetail::firstOrNew(['relation_id' => $studentParentDetail->relation_id, 'student_id' => $student_id]);
            	 $studentParentDetails->student_id=$student_id; 
            	 $studentParentDetails->perent_info_id=$studentParentDetail->perent_info_id;
            	 $studentParentDetails->relation_id=$studentParentDetail->relation_id;
            	 $studentParentDetails->save();
            }
            return 'success';

      } catch (Exception $e) {
        return $e;
      }

    }  
}