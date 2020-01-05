<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\AdmissionApplication;
use App\Model\AdmissionSeat;
use App\Model\PaymentMode;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class SubmitApplicationFormController extends Controller
{
    
    public function index($value=''){ 
    	 return view('admin.student.studentdetails.submitapplicationform.index');
    }
    public function search(Request $request){ 
           
      $admissionApplication=AdmissionApplication::find($request->application_no);
      if (empty($admissionApplication)) {
        $response= array();                       
       $response['status']= 0; 
       $response['msg']= 'Invalid Application No.'; 
       return  $response; 
      }
      elseif ($admissionApplication->status==1) {
        $response= array();                       
       $response['status']= 0; 
       $response['msg']= 'Not Final Submitted'; 
       return  $response; 
      }
      $st=new Student();
      $student=$st->getStudentDetailsById($admissionApplication->student_id);   
      $student->classes->id;
      $AdmissionSeat=AdmissionSeat::where('class_id',$student->classes->id)->first();
      $paymentModes=PaymentMode::orderBy('name','ASC')->get();
      $response=array();
      $response['status']=1;
      $response['data']= view('admin.student.studentdetails.submitapplicationform.fee_details',compact('student','AdmissionSeat','paymentModes'))->render();
	  return $response;
    }
    public function submitted(Request $request){ 
    
       $admissionApplication=AdmissionApplication::where('student_id',$request->student_id)->first();
       $admissionApplication->status=3;
       $admissionApplication->save();
       $response= array();                       
       $response['status']= 1; 
       $response['msg']= 'Form Received Successfully'; 
       return  $response;
    } 
    public function scrutiny($value=''){
      $academicYears=AcademicYear::all(); 
      $classes=MyFuncs::getClassByHasUser(); 
      return view('admin.student.studentdetails.applicationscrutiny.index',compact('admissionApplications','academicYears','classes'));
    }
    public function filter(Request $request,$id){
      $conditionId=$id;
      $student=Student::where('class_id',$request->class)->pluck('id')->toArray(); 
      $admissionApplications=AdmissionApplication::where('for_academic_year',$request->academic_year)->whereIn('student_id',$student)->where('status',$conditionId)->get(); 
       
      return view('admin.student.studentdetails.applicationscrutiny.filter_list',compact('admissionApplications','conditionId'));
     
    }
    public function remark($id,$status){ 
       
     return view('admin.student.studentdetails.applicationscrutiny.remark',compact('id','status'));
    }
    public function remarkStore(Request $request,$id){
     $admissionApplications=AdmissionApplication::find($id);
     $admissionApplications->remark=$request->remark;
     $admissionApplications->status=$request->status;
     $admissionApplications->save();
     if ($request->status==3) {
         $message='Pending Successfully';
     }
     elseif ($request->status==4) {
         $message='Accepted Successfully';
     }
     elseif ($request->status==5) {
         $message='Rejected Successfully';
     }
      $response= array();                       
       $response['status']= 1; 
       $response['msg']= $message; 
       return  $response;
    }
    
}
