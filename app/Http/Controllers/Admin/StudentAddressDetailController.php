<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Address;
use App\Model\Category;
use App\Model\Religion;
use App\Model\SiblingGroup;
use App\Model\StudentAddressDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class StudentAddressDetailController extends Controller
{
	public function address(Request $request,$student_id)
    {   
        

      $studentAddressDetail=StudentAddressDetail::where('student_id',$student_id)->first();
      if ($studentAddressDetail==null) {
      $address=Address::where('id',$studentAddressDetail)->get(); 
       }elseif ($studentAddressDetail!=null) {
     
       $address=Address::where('id',$studentAddressDetail->student_address_details_id)->get();  
       }
      
       
      return view('admin.student.studentdetails.parent.address_list',compact('student_id','address'));   
    }
    public function addAddress(Request $request,$student_id)
    {

        $cotegorys=Category::orderBy('id','ASC')->get();
        $religions=Religion::orderBy('id','ASC')->get(); 
        return view('admin.student.studentdetails.parent.add_address',compact('cotegorys','religions','student_id'));   
    }
    public function addressStore(Request $request)
    { 
        $rules=[
        
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();                       
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        } 
        
        $address = Address::firstOrNew(['student_id' => $request->student_id]);
        $address->student_id=$request->student_id;
        $address->primary_mobile=$request->primary_mobile;
        $address->primary_email=$request->primary_email;
        $address->cotegory_id=$request->cotegory_id;
        $address->religion=$request->religion_id;
        $address->state=$request->state;
        $address->city=$request->city;
        $address->p_address=$request->p_address;
        $address->c_address=$request->c_address;
        $address->p_pincode=$request->p_pincode;
        $address->c_pincode=$request->c_pincode;
        $address->nationality=$request->nationality; 
        $address->save();
        $addressId=$address->id;
         $this->StudentAddressDetailsStore($request->student_id,$addressId);
         $response=['status'=>1,'msg'=>'Address Save Successfully'];
        return response()->json($response);
    } 
    public function StudentAddressDetailsStore($student_id,$addressId)
    {   
       $StudentSiblingInfo = new SiblingGroup();
       $StudentSiblingArrId =$StudentSiblingInfo->getStudentSiblingArrId($student_id);
       if (!empty($StudentSiblingArrId)) {
         foreach ($StudentSiblingArrId as $key => $student_id) {
           $studentAddressDetail=StudentAddressDetail::firstOrNew(['student_id' => $student_id]);
           $studentAddressDetail->student_id=$student_id; 
           $studentAddressDetail->student_address_details_id=$addressId; 
           $studentAddressDetail->save(); 
         }
       }else{
         $studentAddressDetail=StudentAddressDetail::firstOrNew(['student_id' => $student_id]);
           $studentAddressDetail->student_id=$student_id; 
           $studentAddressDetail->student_address_details_id=$addressId; 
           $studentAddressDetail->save();
      
       }

      
    }  
}
