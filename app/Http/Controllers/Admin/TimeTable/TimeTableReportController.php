<?php

namespace App\Http\Controllers\Admin\TimeTable;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Library\TeacherFaculty;
use App\Model\Section;
use App\Model\Subject;
use App\Model\SubjectType;
use App\Model\TimeTable\ClassPeriodSchedule;
use App\Model\TimeTable\DaysType;
use App\Model\TimeTable\ManualTimeTabl;
use App\Model\TimeTable\PeriodTiming;
use App\Model\TimeTable\PeriodType;
use App\Model\TimeTable\TimeTableType;
use Illuminate\Http\Request;

class TimeTableReportController extends Controller
{
    public function index(){
         $timeTableTypes=TimeTableType::all(); 
    	return view('admin.timeTable.timeTableReport.form',compact('timeTableTypes'));
    }


     public function reportFor(Request $request){
     	 if ($request->id==3) {
     	 	$teachers=TeacherFaculty::all();
             return view('admin.timeTable.timeTableReport.teacher',compact('teachers')); 
     	 }if ($request->id==4) {
            $classTypes=ClassType::all();
             return view('admin.timeTable.timeTableReport.class',compact('classTypes'));
     	 	
     	 }
    	 
    }

    public function show(Request $request){
         
         
          if ($request->report_for==1) { 
            $daysTypes=DaysType::all();
            $periodTimings=PeriodTiming::where('time_table_type_id',$request->time_table_type)->get(); 
            $time_table_type_id=$request->time_table_type; 
            $periodTypes=PeriodType::all();
            $sections=Section::all(); 
            $teacherFacultys=TeacherFaculty::all(); 
            $response = array();
            $response['status'] = 1; 
            $response['data'] =view('admin.timeTable.timeTableReport.teacher_wise_show',compact('sections','periodTimings','daysTypes','time_table_type_id','periodTypes','teacherFacultys'))->render(); 
            return response()->json($response);
             
          }if ($request->report_for==2) {
             
            
            $daysTypes=DaysType::all();
            $periodTimings=PeriodTiming::where('time_table_type_id',$request->time_table_type)->get(); 
             $time_table_type_id=$request->time_table_type; 
            $periodTypes=PeriodType::all();
              $sections=Section::all(); 
               
            $response = array();
            $response['status'] = 1; 
            $response['data'] =view('admin.timeTable.timeTableReport.class_wise_show',compact('sections','periodTimings','daysTypes','time_table_type_id','periodTypes'))->render(); 
            return response()->json($response);
          }if ($request->subject_id!=null) { 
           $manualTimeTabls=ManualTimeTabl::where('time_table_type_id',$request->time_table_type)->where('subject_id',$request->subject_id)->get();
            $response = array();
            $response['status'] = 1; 
            $response['data'] =view('admin.timeTable.timeTableReport.teacher_wise_show',compact('manualTimeTabls'))->render(); 
            return response()->json($response);
          }
         
    }
}
