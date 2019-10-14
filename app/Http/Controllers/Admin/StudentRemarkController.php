<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\StudentAddressDetail;
use App\Model\StudentPerentDetail;
use App\Model\StudentRemark;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentRemarkController extends Controller
{
    public function index(){

    	// $students=Student::all();
    	// return $admin_id = Auth::guard('admin')->user()->id; 
    	return view('admin.remark.search');
    }

    public function search(Request $request){
         // return $request;
    	 $students=Student::orWhere('name','LIKE','%'.$request->id.'%')->orWhere('roll_no','LIKE','%'.$request->id.'%')->orWhere('registration_no','LIKE','%'.$request->id.'%')->orWhere('admission_no','LIKE','%'.$request->id.'%')->orWhere('email','LIKE','%'.$request->id.'%')->take(10)->get();
         foreach ($students as  $student) {
             
          $parent =new StudentPerentDetail();           
          $fatherDetail =$parent->getParent($student->id,1);
          $motherDetail =$parent->getParent($student->id,2);

          $StudentAddressDetail =new StudentAddressDetail(); 
          $address =$StudentAddressDetail->getAddress($student->id);
         }
    	 return view('admin.remark.student_details_table',compact('students','fatherDetail'));

    }
    public function addRemark(Request $request,$id){
    	    
    	   $student=Student::find($id);
           $studentRemarks=StudentRemark::where('student_id',$id)->paginate(10);
    	  return view('admin.remark.student_remark_add_form',compact('student','studentRemarks'));

    } 

    public function remarkStore(Request $request,$id){
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
 
    	  $admin_id = Auth::guard('admin')->user()->id;
    	  $studentRemark= new StudentRemark();
    	  $studentRemark->student_id=$request->id;
    	  $studentRemark->teacher_id=$admin_id;
    	  $studentRemark->remark=$request->remark;
    	  $studentRemark->status=1;
    	  $studentRemark->save();
    	   $response= array();
           $response['status']= 1;
           $response['msg']= 'Student Update Successfully';
           return $response;

    }

}
