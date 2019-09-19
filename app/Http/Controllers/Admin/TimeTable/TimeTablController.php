<?php

namespace App\Http\Controllers\Admin\TimeTable;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Library\TeacherFaculty;
use App\Model\Room\ClassWiseRoom;
use App\Model\Section;
use App\Model\Subject;
use App\Model\TimeTable\ClassPeriodSchedule;
use App\Model\TimeTable\DaysType;
use App\Model\TimeTable\ManualTimeTabl;
use App\Model\TimeTable\ManualTimeTablsTable;
use App\Model\TimeTable\PeriodTiming;
use App\Model\TimeTable\PeriodType;
use App\Model\TimeTable\TeacherSubjectClass;
use App\Model\TimeTable\TeacherWorkingDays;
use App\Model\TimeTable\TimeTableType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeTablController extends Controller
{
     public function index(){
     	$timeTableTypes=TimeTableType::all();
     	 $classTypes=MyFuncs::getClassByHasUser();
    	return view('admin.timeTable.timeTableManual.view',compact('timeTableTypes','classTypes'));
    }
    public function classWiseSection(Request $request){
      // return $request;
     $sections=Section::where('class_id',$request->class_id)->get();
     return view('admin.timeTable.timeTableManual.section',compact('sections'));
    }

    public  function  manual(Request $request){
          
        $classTypes=MyFuncs::getClassByHasUser();
        $subjects=Subject::where('classType_id',$request->class_id)->get();
        $daysTypes=DaysType::all();
        $periodTimings=PeriodTiming::where('time_table_type_id',$request->time_table_type_id)->get();
        $classPeriodSchedule=ClassPeriodSchedule::where('class_id',$request->class_id)->where('time_table_type_id',$request->time_table_type_id)->first();

         $time_table_type_id=$request->time_table_type_id;
         $class_id=$request->class_id;
         $sectionId=$request->id;

        $periodTypes=PeriodType::all();
       
        return view('admin.timeTable.timeTableManual.manual_view',compact('periodTimings','daysTypes','periodTypes','classPeriodSchedule','classTypes','time_table_type_id','class_id','subjects','sectionId'));
    }

    public  function  finalResult(Request $request){
            // return $request;
        $classTypes=MyFuncs::getClassByHasUser();
        $subjects=Subject::where('classType_id',$request->class_id)->get();
        $daysTypes=DaysType::all();
        $periodTimings=PeriodTiming::where('time_table_type_id',$request->time_table_type_id)->get();
        $classPeriodSchedule=ClassPeriodSchedule::where('class_id',$request->class_id)->where('time_table_type_id',$request->time_table_type_id)->first();

         $time_table_type_id=$request->time_table_type_id;
         $class_id=$request->class_id;
         $sectionId=$request->section_id;

        $periodTypes=PeriodType::all();
        // $manualTimeTabl=ManualTimeTabl::where('time_table_type_id',$request->time_table_type_id)->where('class_id',$request->class_id)->pluck('period_id')->toArray();
         // $manualTimeTabl=ManualTimeTabl::where('time_table_type_id',$request->time_table_type_id)->where('class_id',$request->class_id)->first();
        return view('admin.timeTable.timeTableManual.final_result',compact('periodTimings','daysTypes','periodTypes','classPeriodSchedule','classTypes','time_table_type_id','class_id','subjects','sectionId'));
    }

    public function manualWiseShow(Request $request){
    	// return $request; 
    	 $subjects=Subject::where('classType_id',$request->class_id)->get();
    	 $teachers=TeacherFaculty::where('class_id',$request->class_id)->get();
    	 $daysTypes=DaysType::all();
    	 $roomTypes=ClassWiseRoom::where('class_id',$request->class_id)->get();
    	 $periodTimings=PeriodTiming::where('time_table_type_id',$request->time_table_type_id)->get();
      // $TeacherWorkingDays=TeacherWorkingDays::where('time_table_type_id',$request->time_table_type_id)->where('period_type',2)->get();

    	 return view('admin.timeTable.timeTableManual.manual_add_form',compact('subjects','teachers','daysTypes','periodTimings','roomTypes'));
    }

    public function subjectWiseTeacher(Request $request){
    	 // return $request;
    	 $teacherSubjectClasss=TeacherSubjectClass::where('subject_id',$request->id)->distinct('teacher_id')->get(['teacher_id']);
    	 // $teachers=TeacherFaculty::where('name',$request->id)->get();
    	return view('admin.timeTable.timeTableManual.teacher',compact('teacherSubjectClasss'));
    }

     public function teacherWisePeriod(Request $request){
        //return $request;
         $TeacherWorkingDays=TeacherWorkingDays::where('time_table_type_id',$request->time_table_type_id)->where('teacher_id',$request->id)->where('period_type',1)->distinct('days_id')->get(['days_id']);
      return view('admin.timeTable.timeTableManual.day_period',compact('TeacherWorkingDays'));
    }
     public function daysWisePeriod(Request $request){
       //return $request;
         $TeacherWorkingDays=TeacherWorkingDays::where('days_id',$request->id)->where('teacher_id',$request->teacher_id)->where('time_table_type_id',$request->time_table_type_id)->where('period_type',1)->get();
         $manualTimeTabl=ManualTimeTabl::where('teacher_id',$request->teacher_id)->where('day_id',$request->id)->pluck('period_id')->toArray();
      return view('admin.timeTable.timeTableManual.timeing',compact('TeacherWorkingDays','manualTimeTabl'));
    }


    public function store(Request $request){
         // return $request;
        $rules=[
        
           'time_table_type' => 'required', 
            'class' => 'required', 
            'section' => "required", 
            'day' => "required", 
            'period' => "required", 
            'teacher' => "required", 
            'subject' => "required", 
            'room' => "required", 
             
       
      ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      } 
      else {
        $manualTimeTabl=ManualTimeTabl::where('time_table_type_id',$request->time_table_type)->where('class_id',$request->class)->where('section_id',$request->section)->where('day_id',$request->day)->where('subject_id',$request->subject)->first();
        if (!empty($manualTimeTabl)) {
           $response=['status'=>0,'msg'=>'Already Created'];
            return response()->json($response);
        }
        $manualTimeTablsTable= new ManualTimeTabl();
        $manualTimeTablsTable->time_table_type_id=$request->time_table_type;
        $manualTimeTablsTable->class_id=$request->class;
        $manualTimeTablsTable->section_id=$request->section;
        $manualTimeTablsTable->day_id=$request->day;
        $manualTimeTablsTable->period_id=$request->period;
        $manualTimeTablsTable->teacher_id=$request->teacher;
        $manualTimeTablsTable->subject_id=$request->subject;
        $manualTimeTablsTable->room_id=$request->room;
        $manualTimeTablsTable->status=1;
        $manualTimeTablsTable->save();
         $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 

    }
    public function outoGenerateManual(Request $request){
      $timeTableTypes=TimeTableType::all();
      foreach ($timeTableTypes as $key => $timeTableType) { 
        $classTypes=MyFuncs::getClassByHasUser();
        foreach ($classTypes as $key => $classType) {
           $sections=Section::where('class_id',$classType->id)->get();
           foreach ($sections as $key => $section) {  
              $subjects=Subject::where('classType_id',$classType->id)->get();
              foreach ($subjects as $key => $subject) { 
                $teacherSubjectClasss=TeacherSubjectClass::where('subject_id',$subject->id)->distinct('teacher_id')->get(['teacher_id']); 
                  foreach ($teacherSubjectClasss as $key => $teacherSubjectClass) {
                 
                     $TeacherWorkingDays=TeacherWorkingDays::where('time_table_type_id',$timeTableType->id)->where('teacher_id',$teacherSubjectClass->teacher_id)->where('period_type',1)->distinct('days_id')->get(['days_id']);
                     foreach ($TeacherWorkingDays as $key => $TeacherWorkingDay) {
                   
                       $TeacherWorkingTimings=TeacherWorkingDays::where('time_table_type_id',$timeTableType->id)->where('days_id',$TeacherWorkingDay->days_id)->where('teacher_id',$teacherSubjectClass->teacher_id)->where('period_type',1)->get();
                        foreach ($TeacherWorkingTimings as $key => $TeacherWorkingTiming) {  
                          $manualTimeTablsTable= new ManualTimeTabl();
                          $manualTimeTablsTable->time_table_type_id=$timeTableType->id;
                          $manualTimeTablsTable->class_id=$classType->id;
                          $manualTimeTablsTable->section_id=$section->section_id;
                          $manualTimeTablsTable->day_id=$TeacherWorkingDay->days_id;
                          $manualTimeTablsTable->period_id=$TeacherWorkingTiming->period_timeing_id;
                          $manualTimeTablsTable->teacher_id=$teacherSubjectClass->teacher_id;
                          $manualTimeTablsTable->subject_id=$subject->subjectType_id;
                          $manualTimeTablsTable->room_id=1;
                          $manualTimeTablsTable->status=1; 
                          $manualTimeTablsTable->save();
                          
                    }
                 } 
                }
             } 
           }
         } 
       } 
          $response=['status'=>1,'msg'=>'Created Successfully'];
                              return response()->json($response);
    } 


    public function manualDelete($id){
      $ManualTimeTabl=ManualTimeTabl::find($id);
      $ManualTimeTabl->delete();
      $response=['status'=>1,'msg'=>'Delete Successfully'];
      return response()->json($response);
     
    }
}
