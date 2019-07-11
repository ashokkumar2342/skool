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
use App\Model\TimeTable\ManualTimeTabl;
use App\Model\TimeTable\PeriodTiming;
use App\Model\TimeTable\PeriodType;
use App\Model\TimeTable\TeacherAbsent;
use App\Model\TimeTable\TeacherAdjustment;
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
      $classTypes=ClassType::all();
      return view('admin.teacher.teacherDetails.add_form',compact('classTypes'));
    }
     public function addClassWiseSection(Request $request){
      $sections=Section::where('class_id',$request->id)->get();
      return view('admin.teacher.teacherDetails.section',compact('sections'));
    }
     public function store(Request $request){
      // return $request;
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
        $classSaveIdCheck=TeacherFaculty::where('class_id',$request->class_id)->where('section_id',$request->section_id)->first();
        if (!empty($classSaveIdCheck)) {
          $response=['status'=>0,'msg'=>'Class Already Created'];
            return response()->json($response);
        }
        else {
         $teacherfaculties= new TeacherFaculty();
          $teacherfaculties->registration_no=$request->code;
          $teacherfaculties->name=$request->name;
          $teacherfaculties->father_name=$request->father;
          $teacherfaculties->relation_name=$request->relation;
          $teacherfaculties->father_mobile=$request->mobile;
          $teacherfaculties->dob=$request->dob;
          $teacherfaculties->class_id=$request->class_id;
          $teacherfaculties->section_id=$request->section_id;
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
      $classTypes=ClassType::all();
       return view('admin.teacher.teacherDetails.edit',compact('teacherFacultys','classTypes'));
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
            $teacherfaculties->class_id=$request->class_id;
            $teacherfaculties->section_id=$request->section_id;
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
        // $TeacherSaveWorkingDays=TeacherWorkingDays::where('time_table_type_id',$request->time_table_type_id)->where('teacher_id',$request->teacher_id)->first();
         $time_table_type_id=$request->time_table_type_id;
         $teacher_id=$request->teacher_id;
        $periodTypes=PeriodType::all();
        return view('admin.teacher.teacherWorkDays.schedule_show',compact('periodTimings','daysTypes','periodTypes','teacherFacultys','time_table_type_id','teacher_id'));

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
    
             
              

                foreach ($request->period_type as $key => $period_id) {
                  

                   $TeacherWorkingDays=TeacherWorkingDays::firstOrNew(['time_table_type_id'=>$request->time_table_type,'teacher_id'=>$request->teacher_name,'period_timeing_id'=>$request->periodTiming[$key],'days_id'=>$request->days[$key]]);
                    $TeacherWorkingDays->time_table_type_id=$request->time_table_type;
                    $TeacherWorkingDays->teacher_id=$request->teacher_name;
                    $TeacherWorkingDays->period_timeing_id=$request->periodTiming[$key];
                    $TeacherWorkingDays->days_id=$request->days[$key];
                    $TeacherWorkingDays->period_type=$request->period_type[$key];
                    $TeacherWorkingDays->status=1;
                    $TeacherWorkingDays->save();   
                }
              
          
          $response=['status'=>1,'msg'=>'Save Successfully'];
          return response()->json($response);

        } 
    }


    //----------------teacher-multiple----------------------------------------------------------------------
    public function multipleWorkingDays(){

         $teacherFacultys=TeacherFaculty::orderBy('name', 'DESC')->get();
         $timeTableTypes=TimeTableType::all();
         return view('admin.teacher.multipleWork.teacher_multiple',compact('timeTableTypes','teacherFacultys'));
    }

    public function multipleWorkingDaysStore(Request $request)
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
    
             
              

                foreach ($request->teacher_name as $key => $teacher_id) {
                   foreach ($request->period_type as $key => $period_id) {

                   $TeacherWorkingDays=TeacherWorkingDays::firstOrNew(['time_table_type_id'=>$request->time_table_type,'teacher_id'=>$teacher_id,'period_timeing_id'=>$request->periodTiming[$key],'days_id'=>$request->days[$key]]);
                    $TeacherWorkingDays->time_table_type_id=$request->time_table_type;
                    $TeacherWorkingDays->teacher_id=$teacher_id;
                    $TeacherWorkingDays->period_timeing_id=$request->periodTiming[$key];
                    $TeacherWorkingDays->days_id=$request->days[$key];
                    $TeacherWorkingDays->period_type=$request->period_type[$key];
                    $TeacherWorkingDays->status=1;
                    $TeacherWorkingDays->save();   
                  }
                }
              
          
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
    public function teacherWiseClass(Request $request){
      
        $classTypes=ClassType::all(); 
      return view('admin.teacher.teacherSubjectClass.teacher_wise_class',compact('classTypes'));
    }
    public function classWiseSection(Request $request){
     $sections=Section::where('class_id',$request->id)->get();
     $subjects=Subject::where('classType_id',$request->id)->get();
     $classSubject=ClassSubjectPeriod::where('class_id',$request->id)->first();
     return view('admin.teacher.teacherSubjectClass.section',compact('sections','classSubject','subjects'));
     }

      public function SubjectWisePeriod(Request $request){ 
     
     return view('admin.teacher.teacherSubjectClass.total_no_of_period');
     }
     public function toTalSubjectWisePeriod(Request $request){
           // return $request;
     $classSubjectSavePeriod=ClassSubjectPeriod::where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('subject_id',$request->subject_id)->first();
       
      $teacherSubjectClassSaveperiod=TeacherSubjectClass::where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('subject_id',$request->subject_id)->sum('no_of_period');
      if (empty($classSubjectSavePeriod)) {
              $response = array();
              $response=['status'=>0,'msg'=>'Not Create Class Subject Period'];
              return response()->json($response);
      }
     return view('admin.teacher.teacherSubjectClass.button_click_wise_period',compact('classSubjectSavePeriod','teacherSubjectClassSaveperiod','teacherWiseSubjectClassSaveperiod'));
     }
     public function SubjectWisePeriodHistory(Request $request){
          
         $teacherWiseSubjectClassSaveperiod=TeacherSubjectClass::where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('subject_id',$request->subject_id)->get();
          return view('admin.teacher.teacherSubjectClass.all_teacher_history',compact('teacherWiseSubjectClassSaveperiod'));

     }

    public function teacherSubjectClassStore(Request $request){
      
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
          // if ($request->load_balance < $request->no_of_period) {
          //    $response=array();
          //   $response["status"]=0;
          //   $response["msg"]='Load Balance Low';
          //   return response()->json($response);// response as json
          // }
    
              $teacherSubjectClass=TeacherSubjectClass::firstOrNew(['teacher_id'=>$request->teacher_name,'class_id'=>$request->class,'section_id'=>$request->section,'subject_id'=>$request->subject,]);
              $teacherSubjectClass->teacher_id=$request->teacher_name;
              $teacherSubjectClass->no_of_period=$request->no_of_period;
              $teacherSubjectClass->no_of_duration=$request->period_duration;
              $teacherSubjectClass->class_id=$request->class;
              $teacherSubjectClass->section_id=$request->section;
              $teacherSubjectClass->subject_id=$request->subject;
              $teacherSubjectClass->save(); 
               $teacherSubjectClasss=TeacherSubjectClass::where('teacher_id',$request->teacher_name)->get();
            $response = array();
            $response['status'] = 1;
            $response['msg'] = 'Created Successfully';
            $response['data'] =view('admin.teacher.teacherSubjectClass.history_table',compact('teacherSubjectClasss'))->render();   
              
              return response()->json($response); 

        } 
    } 
    public function teacherWiseHistory(Request $request){
      $teacherSubjectClasss=TeacherSubjectClass::where('teacher_id',$request->id)->get();
      $teacherWorkingDays=TeacherWorkingDays::where('teacher_id',$request->id)->pluck('period_type')->toArray();
      $TeacherFacultys=TeacherFaculty::where('id',$request->id)->get();

      return view('admin.teacher.teacherSubjectClass.history_table',compact('teacherSubjectClasss','teacherWorkingDays','TeacherFacultys'));
    }

    public function SubjectWisePeriodHistoryDestroy($id)
    {
       $teacherSubjectClass=TeacherSubjectClass::findOrFail(Crypt::decrypt($id));
       $teacherSubjectClass->delete();
       return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }





    //-------------------------teacher-absent-----------------------------------------------//

    public function teacherAbsent(){
      $teacherFacultys=ManualTimeTabl::orderBy('teacher_id','DESC')->distinct('teacher_id')->get(['teacher_id']);
      $periodTimings=ManualTimeTabl::orderBy('period_id','ASC')->distinct('period_id')->get(['period_id']);
      return view('admin.teacher.teacherAbsent.view',compact('teacherFacultys','periodTimings'));
    }
      public function teacherAbsentStore(Request $request){
        // return $request;
      $rules=[ 
           'teacher'=>'required',
           
           'from_period'=>'required',
           'to_period'=>'required',
           'date'=>'required',
            
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
          
              $teacherAbsent=new TeacherAbsent();
              $teacherAbsent->teacher_id=$request->teacher;
              $teacherAbsent->from_period=$request->from_period;
              $teacherAbsent->to_period=$request->to_period;
              $teacherAbsent->absent_date=$request->date;
              $teacherAbsent->status=1; 
              $teacherAbsent->save(); 
              $response = array();
              $response['status'] = 1;
              $response['msg'] = 'Created Successfully'; 
                return response()->json($response); 

        } 
    } 
     
//-----------------------------teacher-adjustment--------------------------------------------------------------//
     public function adjustment(){ 
      return view('admin.teacher.teacherAdjustment.view');
    } 
    public function teacherAdjustmentShow(Request $request){
       //return $request;
      $teacherAbsents=TeacherAbsent::where('absent_date',$request->absent_date)->get();
      $response = array();
      $response['status'] = 1; 
      $response['data'] = view('admin.teacher.teacherAdjustment.teacher_adjustment_table',compact('teacherAbsents'))->render();
        return response()->json($response); 
      
    } 
    public function teacherAbsentDelete($id){
       $teacherAbsents=TeacherAbsent::find($id);
       $teacherAbsents->delete();
       $response = array();
              $response['status'] = 1;
              $response['msg'] = 'Created Successfully'; 
                return response()->json($response);
    } 

    public function saveAdjustment($teacher_id,$class_id,$subject_id,$period_id,$day_id,$teacherAbsent){
      $teacherAdjustments=TeacherAdjustment::where('teacher_absent_id',$teacherAbsent)->get();
        if (!empty($teacherAdjustments)) { 
           $TeacherAdjustment=new TeacherAdjustment();
           $TeacherAdjustment->teacher_absent_id=$teacherAbsent;
           $TeacherAdjustment->teacher_id=$teacher_id;
           $TeacherAdjustment->class_id=$class_id;
           $TeacherAdjustment->subject_id=$subject_id;
           $TeacherAdjustment->period_id=$period_id;
           $TeacherAdjustment->day_id=$day_id;
           $TeacherAdjustment->save(); 
        }
    }

    public function teacherAdjustment(Request $request){
        // return $request;


       foreach ($request->teacher_id as $key => $teacher) {

        // $teacherFacultys=TeacherFaculty::where('id',$teacher)->get();
         // $teacherSubjectClass=TeacherSubjectClass::findOrFail(Crypt::decrypt($id));
        $teacherAbsent=TeacherAbsent::where('teacher_id',$teacher)->first();

        $absentDay = date('D', strtotime($teacherAbsent->absent_date));
        $day_id=DaysType::where('name','like','%'.$absentDay.'%')->first()->id;
 
        $absentPeriods=ManualTimeTabl::where('teacher_id',$teacherAbsent->teacher_id)->where('day_id',$day_id)->whereBetween('period_id', [$teacherAbsent->from_period, $teacherAbsent->to_period])->get();
        foreach ($absentPeriods as $key => $absentPeriod) {
            $checkPeriodDone=0;
            
          //class wise teacher find  
          $presentAvailableTeachers=ManualTimeTabl::where('day_id',$day_id)->where('teacher_id','!=',$teacherAbsent->teacher_id)->where('class_id',$absentPeriod->class_id)->get(); 
           foreach ($presentAvailableTeachers as $key => $presentAvailableTeacher) { 
             $checkTeacherAvailable =$presentAvailableTeachers=ManualTimeTabl::where('day_id',$day_id)->where('teacher_id','=',$presentAvailableTeacher->teacher_id)->where('period_id',$absentPeriod->period_id)->first();

             if (empty($checkTeacherAvailable)) {
                 $this->saveAdjustment($presentAvailableTeacher->teacher_id,$absentPeriod->class_id,$absentPeriod->subject_id,$absentPeriod->period_id,$day_id,$teacherAbsent->teacher_id);
                 $checkPeriodDone=1;
                  break;
              }else{
                
              }

           }  
          //end class wise teacher find 
           if ($checkPeriodDone==0) {  
               //start subject class wise teacher find
               $presentAvailableTeachersSubjectWises=ManualTimeTabl::where('day_id',$day_id)->where('teacher_id','!=',$teacherAbsent->teacher_id)->where('class_id',$absentPeriod->class_id)->where('subject_id',$absentPeriod->subject_id)->get();  
                foreach ($presentAvailableTeachersSubjectWises as $key => $presentAvailableTeachersSubjectWise) { 
                  $checkTeacherAvailableSubject =ManualTimeTabl::where('day_id',$day_id)->where('teacher_id','=',$presentAvailableTeachersSubjectWise->teacher_id)->where('period_id',$absentPeriod->period_id)->first();

                  if (empty($checkTeacherAvailableSubject)) {

                     $this->saveAdjustment($presentAvailableTeachersSubjectWise->teacher_id,$absentPeriod->class_id,$checkTeacherAvailableSubject->subject_id,$absentPeriod->period_id,$day_id,$teacherAbsent->teacher_id);

                      $checkPeriodDone=1;
                       break;

                   }else{
                     
                   }

                } 
           }
           if ($checkPeriodDone==0) {  
               //start subject wise teacher find
               $presentAvailableTeachersSubjectWises=ManualTimeTabl::where('day_id',$day_id)->where('teacher_id','!=',$teacherAbsent->teacher_id)->where('subject_id',$absentPeriod->subject_id)->get();  
                foreach ($presentAvailableTeachersSubjectWises as $key => $presentAvailableTeachersSubjectWise) { 
                  $checkTeacherAvailableSubject =ManualTimeTabl::where('day_id',$day_id)->where('teacher_id','=',$presentAvailableTeachersSubjectWise->teacher_id)->where('period_id',$absentPeriod->period_id)->first();

                  if (empty($checkTeacherAvailableSubject)) {

                      $this->saveAdjustment($presentAvailableTeachersSubjectWise->teacher_id,$absentPeriod->class_id,$absentPeriod->subject_id,$absentPeriod->period_id,$day_id,$teacherAbsent->teacher_id);
                      $checkPeriodDone=1;
                       break;

                   }else{
                      
                   }

                } 
           }

          
        }

        $teacherAdjustments=TeacherAdjustment::all();
        $response = array();
          $response['status'] = 1;
        $response['data'] = view('admin.teacher.teacherAdjustment.teacher_adjustment_result_form',compact('teacherAdjustments'))->render();
            return response()->json($response);
       
       } 
       
    }
}
