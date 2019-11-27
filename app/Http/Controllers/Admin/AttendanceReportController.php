<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\LeaveRecord;
use App\Model\Section;
use App\Model\StudentAttendance;
use App\Model\StudentAttendanceClass;
use App\Student;
use Auth;
use Illuminate\Http\Request;

class AttendanceReportController extends Controller
{
    public function index()
    {
      $sections=Section::orderBy('class_id','ASC')->orderBy('section_id','ASC')->get();
      $academicYears=AcademicYear::all();
    	 return view('admin.attendance.report.view',compact('sections','academicYears'));
    }
    public function show(Request $request){
      $date=$request->date;  
     if ($request->strength_report==1) {
         $sections=Section::find($request->class_id);
         $attendanceClass=StudentAttendanceClass::where('class_id',$sections->class_id)
                                                ->where('section_id',$sections->section_id)
                                                ->where('date',$request->date)
                                                ->get(); 
         $student=Student::where('class_id',$sections->class_id)
                          ->where('section_id',$sections->section_id)
                          ->pluck('id')
                          ->toArray();
	       $response["status"]=1;
	       $response["data"]=view('admin.attendance.report.result1',compact('date','student','attendanceClass'))->render(); 
	       return $response; 
      }
    elseif ($request->attendance_report==1) {
            $report_for=$request->report_for;
            $date=$request->date;
            $sections=Section::orderBy('class_id','ASC')->orderBy('section_id','ASC')->get();  
            $response=array();
            $response["status"]=1;
            $response["data"]=view('admin.attendance.report.result2',compact('date','sections','report_for'))->render(); 
            return $response; 
      }
    elseif ($request->month_report==1) {
      return $request;
      return  $academicYears=AcademicYear::where('id','<=',$request->academic_year_id)->get();      
      $response=array();
      $response["status"]=1;
      $response["data"]=view('admin.attendance.report.result2',compact('date','AttendanceReport','stusents'))->render(); 
      return $response; 
      }
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
    {  $date=$request->date;
       $sections=Section::orderBy('class_id','ASC')->orderBy('section_id','ASC')->get(); 
       $response=array();
       $response["status"]=1;
       $response["data"]=view('admin.attendance.sendsms.send_table',compact('sections','attendanceClass','date'))->render(); 
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