<?php

namespace App\Model;

use App\Model\ParentsInfo;
use Illuminate\Database\Eloquent\Model;

class StudentPerentDetail extends Model
{
    protected $fillable = [
        'relation_id', 'student_id', 
    ];
    Public function relation(){
        return $this->hasOne(GuardianRelationType::class,'id','relation_id'); 
    }
    public function getParent($student_id,$relation_id){
        try { 
            $parent=$this->where('student_id',$student_id)
                 ->where('relation_id',$relation_id)
                 ->first();
                 if (!empty($parent)) {
                      return ParentsInfo::find($parent->perent_info_id); 
                 }else{
                    return null;
                 }
               
            
        } catch (Exception $e) {
            
        }
    }
    public function getStudentsAllDetilas()
     {
      try {
           return $this 
                
                ->join('student_address_details','student_address_details.student_id','=','student_perent_details.student_id')
                ->join('addresses','addresses.id','=','student_address_details.student_address_details_id')
                ->join('students','students.id','=','student_perent_details.student_id')
                
                ->join('parents_infos','parents_infos.id','=','student_perent_details.perent_info_id')
                ->join('guardian_relation_types','guardian_relation_types.id','=','student_perent_details.relation_id')
                ->select(
                  'students.*',
                  'parents_infos.name as f_name',
                  'parents_infos.mobile as f_mobile',
                  'student_perent_details.*',
                  'addresses.*'
                )
                ->where('relation_id',1) 
                ->get();
                 
              

         } catch (Exception $e) {
            
        }
     }
     public function getStudentDetilas($student_id)
     {
      try {
           return $this 
                
                ->join('student_address_details','student_address_details.student_id','=','student_perent_details.student_id')
                ->join('addresses','addresses.id','=','student_address_details.student_address_details_id')
                ->join('students','students.id','=','student_perent_details.student_id')
                
                ->join('parents_infos','parents_infos.id','=','student_perent_details.perent_info_id')
                ->join('guardian_relation_types','guardian_relation_types.id','=','student_perent_details.relation_id')
                ->select(
                  'students.*',
                  'parents_infos.name as f_name',
                  'parents_infos.mobile as f_mobile',
                  'student_perent_details.*',
                  'addresses.*'
                )
                ->where('relation_id',1) 
                ->where('student_perent_details.student_id',$student_id) 
                ->first();
                 
              

         } catch (Exception $e) {
            
        }
     } 
     public function getClassByStudent($class_id,$section_id)
     {
      try {
           return $this 
                
                ->join('student_address_details','student_address_details.student_id','=','student_perent_details.student_id')
                ->join('addresses','addresses.id','=','student_address_details.student_address_details_id')
                ->join('students','students.id','=','student_perent_details.student_id')
                
                ->join('parents_infos','parents_infos.id','=','student_perent_details.perent_info_id')
                ->join('guardian_relation_types','guardian_relation_types.id','=','student_perent_details.relation_id')
                ->select(
                  'students.*',
                  'parents_infos.name as f_name',
                  'parents_infos.mobile as f_mobile',
                  'student_perent_details.*',
                  'addresses.*'
                )
                ->where('relation_id',1) 
                ->where('student_perent_details.student_id',$student_id) 
                ->first();
                 
              

         } catch (Exception $e) {
            
        }
     } 

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
