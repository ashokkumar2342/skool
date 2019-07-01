<?php

namespace App\Http\Controllers\Admin\TimeTable;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Library\TeacherFaculty;
use App\Model\SubjectType;
use App\Model\TimeTable\ManualTimeTabl;
use App\Model\TimeTable\TimeTableType;
use Illuminate\Http\Request;

class TimeTableReportController extends Controller
{
    public function index(){
         $timeTableTypes=TimeTableType::all(); 
    	return view('admin.timetable.timeTableReport.form',compact('timeTableTypes'));
    }


     public function reportFor(Request $request){
     	 if ($request->id==1) {
     	 	$teachers=TeacherFaculty::all();
             return view('admin.timetable.timeTableReport.teacher',compact('teachers')); 
     	 }if ($request->id==2) {
            $classTypes=ClassType::all();
             return view('admin.timetable.timeTableReport.class',compact('classTypes'));
     	 	
     	 }if ($request->id==3) {
     	 	 $SubjectTypes=SubjectType::all();
             return view('admin.timetable.timeTableReport.subject',compact('SubjectTypes'));
     	 }if ($request->id==4) {
     	 	  
     	 }if ($request->id==5) {
     	 	
     	 } 
    	 
    }

    public function show(Request $request){

         $data=$request;
          if ($data->teacher_id!=null) { 
            $manualTimeTabls=ManualTimeTabl::where('time_table_type_id',$request->time_table_type)->where('teacher_id',$request->teacher_id)->get();
            $response = array();
            $response['status'] = 1; 
            $response['data'] =view('admin.timetable.timeTableReport.teacher_wise_show',compact('manualTimeTabls'))->render(); 
            return response()->json($response);
             
          }if ($data->class_id!=null) { 
            $manualTimeTabls=ManualTimeTabl::where('time_table_type_id',$request->time_table_type)->where('class_id',$request->class_id)->get();
            $response = array();
            $response['status'] = 1; 
            $response['data'] =view('admin.timetable.timeTableReport.teacher_wise_show',compact('manualTimeTabls'))->render(); 
            return response()->json($response);
          }if ($request->subject_id!=null) { 
           $manualTimeTabls=ManualTimeTabl::where('time_table_type_id',$request->time_table_type)->where('subject_id',$request->subject_id)->get();
            $response = array();
            $response['status'] = 1; 
            $response['data'] =view('admin.timetable.timeTableReport.teacher_wise_show',compact('manualTimeTabls'))->render(); 
            return response()->json($response);
          }
         
    }
}
