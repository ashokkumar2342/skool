<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Address;

class StudentAddressDetail extends Model
{
    protected $fillable = [
        'student_id',
           ];
            
 public function religions(){
        return $this->hasOne('App\Model\Religion','id','religion');
    }
    public function getAddress($student_id){
        try {         
            $address =$this->where('student_id',$student_id)->first();
            if (!empty($address)) {
                 return Address::find($address->student_address_details_id);
            }else{
                return null;
            }
            
        } catch (Exception $e) {
            return $e;
        }
    }
    Public function getAddressArrId($student_id,$sibling_student_id){
      try {
            $arr_id= $this->where('student_id',$student_id)->pluck('id')->toArray(); 
            $sibling_arr_id= $this->where('student_id',$sibling_student_id)->pluck('id')->toArray(); 
            foreach ($arr_id as $key => $id) {
            	 $studentAddressDetail=StudentAddressDetail::find($id);

            	 $studentAddressDetails=StudentAddressDetail::firstOrNew(['student_id' => $sibling_student_id]);
            	 $studentAddressDetails->student_id=$sibling_student_id; 
            	 $studentAddressDetails->student_address_details_id=$studentAddressDetail->student_address_details_id;
            	  
            	 $studentAddressDetails->save();
            }

            foreach ($sibling_arr_id as $key => $id) {
            	 $studentAddressDetail=StudentAddressDetail::find($id); 
            	 $studentAddressDetails=StudentAddressDetail::firstOrNew(['student_id' => $student_id]);
            	 $studentAddressDetails->student_id=$student_id; 
            	 $studentAddressDetails->student_address_details_id=$studentAddressDetail->student_address_details_id;
            	  
            	 $studentAddressDetails->save();
            }
            return 'success';

      } catch (Exception $e) {
        return $e;
      }

    }  
}
