<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AdmissionApplication;
use App\Model\AdmissionSeat;
use App\Model\PaymentMode;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
      return view('admin.student.studentdetails.applicationscrutiny.index',compact('admissionApplications'));
    }
    public function filter($id){
      $conditionId=$id;
      if ($id==3) {
        $admissionApplications=AdmissionApplication::where('status',3)->get(); 
        }
        else if ($id==4) {
        $admissionApplications=AdmissionApplication::where('status',4)->get(); 
        }
        else if ($id==5) {
        $admissionApplications=AdmissionApplication::where('status',5)->get(); 
        }  
      return view('admin.student.studentdetails.applicationscrutiny.filter_list',compact('admissionApplications','conditionId'));
     
    }
    public function remark($id){ 
      
     return view('admin.student.studentdetails.applicationscrutiny.remark',compact('id'));
    }
    public function remarkStore(Request $request,$id){ 
     $admissionApplications=AdmissionApplication::find(Crypt::decrypt($id));
     $admissionApplications->remark=$request->remark;
     $admissionApplications->save();
      $response= array();                       
       $response['status']= 1; 
       $response['msg']= 'Remark Submit Successfully'; 
       return  $response;
    }
    public function pending($id){ 
      $admissionApplications=AdmissionApplication::find(Crypt::decrypt($id));
      $admissionApplications->status=3;
      $admissionApplications->save();
      return redirect()->back()->with(['message'=>'Pending Successfully','class'=>'success']);
    }
    public function accepted($id){       
      $admissionApplications=AdmissionApplication::find(Crypt::decrypt($id)); 
      $admissionApplications->status=4;
      $admissionApplications->save();
      return redirect()->back()->with(['message'=>'Accepted Successfully','class'=>'success']); 
    }
    public function rejected($id){ 
      $admissionApplications=AdmissionApplication::find(Crypt::decrypt($id));
      $admissionApplications->status=5;
      $admissionApplications->save();
      return redirect()->back()->with(['message'=>'Rejected Successfully','class'=>'success']);
    }
}
