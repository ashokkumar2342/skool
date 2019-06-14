<?php

namespace App\Http\Controllers\Admin\TimeTable;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Library\TeacherFaculty;
use App\Model\Section;
use App\Model\Subject;
use App\Model\SubjectType;
use App\Model\TimeTable\ClassPeriodSchedule;
use App\Model\TimeTable\ClassSubjectPeriod;
use App\Model\TimeTable\DaysType;
use App\Model\TimeTable\PeriodTiming;
use App\Model\TimeTable\PeriodType;
use App\Model\TimeTable\TeacherSubjectClass;
use App\Model\TimeTable\TeacherWorkingDays;
use App\Model\TimeTable\TimeTableType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function index(){
     
    	return view('admin.teacher.teacherDetails.view',compact('teacherFacultys'));
    }
    public function addForm(){
      return view('admin.teacher.teacherDetails.add_form');
    }
     public function store(Request $request){
      $rules=[
        
           'name' => 'required', 
            'mobile' => 'required|digits:10', 
            'email' => "required|max:50", 
            'code' => "required|max:20", 
            'father' => "required", 
            'relation' => "required", 
            'joining_date' => "required", 
            'dob' => "required", 
             
       
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
         $teacherfaculties= new TeacherFaculty();
          $teacherfaculties->registration_no=$request->code;
          $teacherfaculties->name=$request->name;
          $teacherfaculties->father_name=$request->father;
          $teacherfaculties->relation_name=$request->relation;
          $teacherfaculties->father_mobile=$request->mobile;
          $teacherfaculties->dob=$request->dob;
          $teacherfaculties->joining_date=$request->joining_date;
          $teacherfaculties->email=$request->email;
          $teacherfaculties->c_address=$request->address;
          $teacherfaculties->status=1;
          $teacherfaculties->save();
         $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
     

    public function tableShow(){
       $teacherFacultys=TeacherFaculty::all();
      return view('admin.teacher.teacherDetails.table_show',compact('teacherFacultys'));
    }
     public function edit($id){
      $teacherFacultys=TeacherFaculty::findOrFail(Crypt::decrypt($id));
       return view('admin.teacher.teacherDetails.edit',compact('teacherFacultys'));
    }
    public function destroy($id)
    {
        $teacherFacultys=TeacherFaculty::findOrFail(Crypt::decrypt($id));
       $teacherFacultys->delete();
       return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
     public function update(Request $request,$id){
        // return  $request;
        $rules=[
          
            'name' => 'required', 
            'mobile' => 'required|digits:10', 
            'email' => "required|max:50", 
            'code' => "required|max:20", 
            'father' => "required", 
            'relation' => "required", 
            'joining_date' => "required", 
            'dob' => "required", 
       
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
            $teacherfaculties=TeacherFaculty::find($id);
            $teacherfaculties->registration_no=$request->code;
            $teacherfaculties->name=$request->name;
            $teacherfaculties->father_name=$request->father;
            $teacherfaculties->relation_name=$request->relation;
            $teacherfaculties->father_mobile=$request->mobile;
            $teacherfaculties->dob=$request->dob;
            $teacherfaculties->joining_date=$request->joining_date;
            $teacherfaculties->email=$request->email;
            $teacherfaculties->c_address=$request->address;
            $teacherfaculties->status=1;
            $teacherfaculties->save();
            $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        
        } 
         
    }


    //--------------teacher-working-days----------------------------------------------//

     public function workDays(){
       $teacherFacultys=TeacherFaculty::orderBy('name', 'DESC')->get();
         $timeTableTypes=TimeTableType::all();
     	return view('admin.teacher.teacherWorkDays.view_work_days',compact('timeTableTypes','teacherFacultys'));
    	
    }
    public function workingDaysShow(Request $request){
      // return $request;
         $teacherFacultys=TeacherFaculty::orderBy('name', 'DESC')->get();
        $daysTypes=DaysType::all();
        $periodTimings=PeriodTiming::where('time_table_type_id',$request->time_table_type_id)->get();
        $TeacherWorkingDays=TeacherWorkingDays::where('time_table_type_id',$request->time_table_type_id)->where('teacher_id',$request->teacher_id)->first();
        $periodTypes=PeriodType::all();
        return view('admin.teacher.teacherWorkDays.schedule_show',compact('periodTimings','daysTypes','periodTypes','TeacherWorkingDays','teacherFacultys'));

    }
     public function teacherWorkingStore(Request $request)
    {
           // return $request;
        $rules=[ 
           'teacher_name'=>'required',
           'time_table_type'=>'required',
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
    
              $TeacherWorkingDays=TeacherWorkingDays::firstOrNew(['time_table_type_id'=>$request->time_table_type]);
              $TeacherWorkingDays->time_table_type_id=$request->time_table_type;
              $TeacherWorkingDays->teacher_id=$request->teacher_name;
              $TeacherWorkingDays->period_timeing_id=implode(',', $request->periodTiming);
              $TeacherWorkingDays->days_id=implode(',', $request->day);
              $TeacherWorkingDays->period_type=implode(',', $request->period_type);
              $TeacherWorkingDays->status=1;
              $TeacherWorkingDays->save();   
          
          $response=['status'=>1,'msg'=>'Save Successfully'];
          return response()->json($response);

        } 
    }

    //---------------------teacher-subject-class------------------------------------------------------------//
    public function teacherClassSubject(){
        $teacherFacultys=TeacherFaculty::orderBy('name', 'DESC')->get();
        $classTypes=ClassType::all();
        $subjectTypes=SubjectType::all();
       
    	return view('admin.teacher.teacherSubjectClass.view_subject_class',compact('teacherFacultys','classTypes','subjectTypes'));
    }
    public function classWiseSection(Request $request){
     $sections=Section::where('class_id',$request->id)->get();
     $subjects=Subject::where('classType_id',$request->id)->get();
     $classSubject=ClassSubjectPeriod::where('class_id',$request->id)->first();
     return view('admin.teacher.teacherSubjectClass.section',compact('sections','classSubject','subjects'));
     }

    public function teacherSubjectClassStore(Request $request){
     // return  $request;
      $rules=[ 
           'teacher_name'=>'required',
           
           'no_of_period'=>'required',
           'class'=>'required',
           'section'=>'required',
           'subject'=>'required',
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
    
              $teacherSubjectClass=TeacherSubjectClass::firstOrNew(['teacher_id'=>$request->teacher_name,'class_id'=>$request->class,'section_id'=>$request->section,'subject_id'=>$request->subject,]);
              $teacherSubjectClass->teacher_id=$request->teacher_name;
              $teacherSubjectClass->no_of_period=$request->no_of_period;
              $teacherSubjectClass->no_of_duration=$request->period_duration;
              $teacherSubjectClass->class_id=$request->class;
              $teacherSubjectClass->section_id=$request->section;
              $teacherSubjectClass->subject_id=$request->subject;
              $teacherSubjectClass->save(); 
               $teacherSubjectClasss=TeacherSubjectClass::all();
            $response = array();
            $response['status'] = 1;
            $response['msg'] = 'Created Successfully';
            $response['data'] =view('admin.teacher.teacherSubjectClass.history_table',compact('teacherSubjectClasss'))->render();   
              
                  return response()->json($response); 

        } 
    } 
    public function teacherWiseHistory(Request $request){
      $teacherSubjectClasss=TeacherSubjectClass::where('teacher_id',$request->id)->get();
      return view('admin.teacher.teacherSubjectClass.history_table',compact('teacherSubjectClasss'));
    }
}
