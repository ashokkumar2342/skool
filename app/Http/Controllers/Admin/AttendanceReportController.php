<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\LeaveRecord;
use App\Model\Section;
use App\Model\StudentAttendanceClass;
use Illuminate\Http\Request;
use Auth;

class AttendanceReportController extends Controller
{
    public function index()
    {
    	 return view('admin.attendance.report.view');
    }
    public function show(Request $request)
    {
      $attendanceClass=StudentAttendanceClass::where('date',$request->date)->get();
      foreach ($attendanceClass as $value) {
      $sections=Section::where('class_id','!=',$value->class_id)->orderBy('class_id','ASC')->orderBy('section_id','ASC')->get(); 
      }
      if (empty($sections)) {
        $response=array();
	    $response["status"]=0;
	    $response["msg"]='Record Not Found'; 
	    return $response; 
      }
	  $response=array();
	  $response["status"]=1;
	  $response["data"]=view('admin.attendance.report.result',compact('sections','attendanceClass'))->render(); 
	  return $response; 
    }

    //-------------leave-report-------------------------------------------------------
    public function leaveReport()
    {
    	 return view('admin.attendance.report.leave_view');
    	  
    }
    public function leaveReportFilter(Request $request)
    {
       $reportType= $request->id;
       return view('admin.attendance.report.filter_page',compact('reportType'));
        
    }
    public function leaveReportShow(Request $request) 
    {
      
      return $leaveapply=LeaveRecord::where('apply_date',$request->apply_date)->get();
    }


    //-------------------------send-sms------------------------------------------
    public function smsSend($value='')
    {
       // $attendanceClass=StudentAttendanceClass::where('sms_send',)->get();
       return view('admin.attendance.sendsms.list');
    }
    public function SmsSendshow(Request $request)
    {
       $attendanceClass=StudentAttendanceClass::where('date',$request->date)->where('verified','!=',0)->get();
       $response=array();
       $response["status"]=1;
       $response["data"]=view('admin.attendance.sendsms.send_table',compact('sections','attendanceClass'))->render(); 
       return $response; 
        
    }
    public function SmsSendFinal(Request $request)
    { 
      $user_id=Auth::guard('admin')->user()->id;
      $attendanceClass=StudentAttendanceClass::whereIn('class_id',$request->class_id)->whereIn('section_id',$request->section_id)->where('verified','!=',0)->where('sms_sent',0)->get(); 
       foreach ($attendanceClass as  $value) {
       $studentAttendanceClass=StudentAttendanceClass::find($value->id); 
        $studentAttendanceClass->sms_sent =1;
        $studentAttendanceClass->sms_sent_by = $user_id;  
        $studentAttendanceClass->sms_sent_date=date('Y-m-d');
        $studentAttendanceClass->save(); 
       }
         $response=['status'=>1,'msg'=>'Send successfully'];
            return response()->json($response); 

    }
}
