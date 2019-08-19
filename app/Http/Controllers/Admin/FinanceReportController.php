<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Cashbook;
use App\Model\ClassType;
use App\Model\StudentFeeDetail;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FinanceReportController extends Controller
{
  public function dateRange(Request $request)
  {
    $dateRange=$request->id;
     return view('admin.financeReport.date_range',compact('dateRange')); 
  }
   public function index($value='')
   {
    $cashbooks=Cashbook::orderBy('user_id','ASC')->distinct('user_id')->get(['user_id']);
    return view('admin.financeReport.view',compact('cashbooks'));
   }
   public function feeReport(Request $request)
   {

   	$reportWise=$request->id;

   	$registrations=Student::where('student_status_id',1)->get();
   	$classTypes=ClassType::orderBy('id','ASC')->get();
    return view('admin.financeReport.fee_report' ,compact('classTypes','reportWise','registrations'));
   }
   public function feeReportShow(Request $request)
   {     
        $rules=array(); 
        $error=""; 
      
        $date = date('Y-m-d',strtotime(date('Y-m-d') ."1 days"));
           $report_for='';
           $user_id='';
           $report_wise='';
           $weekMonthYear='';
           if ($request->has('report_for')) {
             $report_for = $request->report_for;
             if ($report_for==1) {
              $weekMonthYear=date('Y-m-d',strtotime($date ."-1 days")); 
             }elseif($report_for==2){
              $weekMonthYear=date('Y-m-d',strtotime($date ."-7 days")); 
             }elseif($report_for==3){
              $weekMonthYear=date('Y-m-d',strtotime($date ."-30 days")); 
             }elseif($report_for==4){
              $weekMonthYear=date('Y-m-d',strtotime($date ."-365 days")); 
             }elseif($report_for==5){
              $daterange  = explode('-',$request->daterange); 
              $weekMonthYear = date( 'Y-m-d', strtotime($daterange[0]));
              $date = date( 'Y-m-d', strtotime($daterange[1]));
             }
             
           }
          if ($request->has('user_id')) {
             $user_id = $request->user_id;
           }
          if ($request->has('report_wise')) {
             $report_wise = $request->report_wise;
           }
           
        
   	    if ($request->has('report_for') || $request->has('user_id') || $request->has('report_wise')) {  
             
            if ($request->report_for==$report_for && $request->has('user_id') && $request->report_wise==4) { 
                $rules['class_id']='required';
                $rules['section_id']='required';
               $cashbooks = Cashbook::whereBetween('created_at', [$weekMonthYear,$date ])->where('user_id', $user_id)->where('class_id', $request->class_id)->where('section_id', $request->section_id)->get();
             } elseif ($request->report_for==$report_for && $request->has('user_id') && $request->report_wise==3) { 
                $rules['class_id']='required';
               $cashbooks = Cashbook::whereBetween('created_at', [$weekMonthYear,$date ])->where('user_id', $user_id)->where('class_id', $request->class_id)->get();
             }elseif ($request->report_for==$report_for && $request->has('user_id') && $request->report_wise==2) { 
                $rules['registration_no']='required';
               $cashbooks = Cashbook::whereBetween('created_at', [$weekMonthYear,$date ])->where('user_id', $user_id)->where('student_id', $request->registration_no)->get();
             }elseif ($request->report_for==$report_for && $request->has('user_id')) {
               $cashbooks = Cashbook::whereBetween('created_at', [$weekMonthYear,$date ])->where('user_id', $user_id)->get();
             }
             elseif ($request->report_for==$report_for && $request->report_for!='') { 
               $cashbooks = Cashbook::whereBetween('created_at', [$weekMonthYear,$date ])->get();
             }
             elseif ($request->has('user_id')) {
               $cashbooks = Cashbook::where('user_id', $user_id)->get();
             }elseif ($request->report_wise==2) { 
               $rules['registration_no']='required';
               $cashbooks = Cashbook::where('student_id', $request->registration_no)->get();
             }elseif ($request->report_wise==3) {
               $rules['class_id']='required';
               $cashbooks = Cashbook::where('class_id', $request->class_id)->get();
             }elseif ($request->report_wise==4) {
               $rules['class_id']='required';
               $rules['section_id']='required';
               $cashbooks = Cashbook::where('class_id', $request->class_id)->where('section_id', $request->section_id)->get();
             }
            
              
          }
      
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
    
    $response = array();
    $response['status'] = 1; 
    $response['data'] =view('admin.financeReport.result' ,compact('cashbooks'))->render(); 
      return response()->json($response); 
   	  
   }
   public function feeDueReport($value='')
   {
     $academicYears=AcademicYear::orderBy('id','ASC')->get();
     return view('admin.financeReport.feeDue.view',compact('academicYears'));
   }
   public function feeDueReportShow(Request $request)
   {   
        $StudentFeeDetails = StudentFeeDetail::where('paid',0)->whereMonth('last_date',$request->month)->distinct('student_id')->get(['student_id']);
      $month =$request->month;
      $response = array();
                  $response['status'] = 1; 
                  $response['data'] =view('admin.financeReport.feeDue.show' ,compact('StudentFeeDetails','month'))->render(); 
                    return response()->json($response); 
   }

   //---------------new-admission-report--------------------------//////////
   public function adminssionReport()
   {
      return view('admin.financeReport.newAdmission.view');
   }
   public function adminssionReportShow(Request $request)
   {   
      if ($request->report_wise==1) {
          $students=Student::where('date_of_admission',date('Y-m-d'))->get();
     
      }
      if ($request->report_wise==3) {
          $students=Student::where('class_id',$request->class_id)->where('date_of_admission',date('Y-m-d'))->get();
     
      }
      if ($request->report_wise==4) {
          $students=Student::where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('date_of_admission',date('Y-m-d'))->get(); 
      }
      $response = array();
                  $response['status'] = 1; 
                  $response['data'] =view('admin.financeReport.newAdmission.show' ,compact('students'))->render(); 
                    return response()->json($response); 
   }
}
