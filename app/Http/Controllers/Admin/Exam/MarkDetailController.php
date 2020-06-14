<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Exam\ClassTest;
use App\Model\Exam\ClassTestDetail;
use App\Model\Exam\ExamSchedule;
use App\Model\Exam\ExamTerm;
use App\Model\Exam\MarkDetail;
use App\Student;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Log;

class MarkDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicYears=AcademicYear::orderBy('id','ASC')->get();
        $examTerms=ExamTerm::orderBy('id','ASC')->get();
        $markDetails = MarkDetail::all();
        $students = Student::all();
        $examSchedules = ExamSchedule::all();         
        return view('admin.exam.marks_details',compact('markDetails','students','examSchedules','academicYears','examTerms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function searchStudent(Request $request)
    {  
       if ($request->academic_year_id!=0) { 
         $examTerms=ExamTerm::where('academic_year_id',$request->academic_year_id)->get();
         return view('admin.exam.value_page',compact('examTerms','examSchedule')); 
        }
        if($request->exam_term_id!=0){
        $examSchedule = ExamSchedule::find($request->exam_term_id); 
          $examSchedules = ExamSchedule::where('exam_term_id',$request->exam_term_id)->get();
         return view('admin.exam.exam_schedule_value',compact('examTerms','examSchedules'));  
        } 
         
       $examSchedule = ExamSchedule::find($request->id);
        $marksDetails = MarkDetail::where('exam_schedule_id',$request->id)->get();
         $students = Student::where('class_id',$examSchedule->class_id)->get();
         return view('admin.exam.student_marks_details',compact('students','examSchedule','marksDetails'))->render();
    }

   
    public function store(Request $request,$class_test_id)
    {   
        $rules=[  
        'marksobt' => 'required',  
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        $admin=Auth::guard('admin')->user();
        foreach ($request->marksobt as $key => $value) { 
          $ClassTestDetail =ClassTestDetail::firstOrNew(['class_test_id'=>$class_test_id,'student_id'=>$key]); 
          $ClassTestDetail->marksobt = $value;     
          $ClassTestDetail->Attendace = $request->attendance[$key]; 
          $ClassTestDetail->any_remarks = $request->any_remarks[$key]; 
          $ClassTestDetail->save();
        }
        $ClassTest =ClassTest::firstOrNew(['id'=>$class_test_id]);  
        $ClassTest->attendance_status=1;  
        $ClassTest->marks_entered_status=1;  
        $ClassTest->marks_entered_by=$admin->id;  
        $ClassTest->save();  
        $response = array();
        $response['msg'] = 'Submit Successfully';
        $response['status'] = 1;
        return response()->json($response);
    }
    public function marksVerifyStore(Request $request,$class_test_id)
    {   
        $rules=[ 
          
        'marksobt' => 'required',  
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        $admin=Auth::guard('admin')->user();
        foreach ($request->marksobt as $key => $value) { 
          $ClassTestDetail =ClassTestDetail::firstOrNew(['class_test_id'=>$class_test_id,'student_id'=>$key]); 
          $ClassTestDetail->marksobt = $value;     
          $ClassTestDetail->Attendace = $request->attendance[$key]; 
          $ClassTestDetail->any_remarks = $request->any_remarks[$key]; 
          $ClassTestDetail->save();
        }
        $ClassTest =ClassTest::firstOrNew(['id'=>$class_test_id]); 
        $ClassTest->marks_verified_status=1;  
        $ClassTest->marks_verified_by=$admin->id;  
        $ClassTest->save();  
        $response = array();
        $response['msg'] = 'Submit Successfully';
        $response['status'] = 1;
        return response()->json($response);
    }
    public function sendSmsMarks($classTest_id)
     {
        $user_id=Auth::guard('admin')->user()->id;  
        $sendSmsTest=DB::select(DB::raw("call up_sms_classTestmarks ('$classTest_id','$user_id','1','1','1')"));
        $response = array();
        $response['status'] = 1;
        $response['msg'] ='SMS Send Successfully';
        return response()->json($response);   
     }
     public function compile($classTest_id)
      {
        $user_id=Auth::guard('admin')->user()->id;  
        $sendSmsTest=DB::select(DB::raw("call up_compile_SectionTestmarks ('$classTest_id','$user_id')")); 
        $response = array();
        $response['status'] = 1;
        $response['msg'] ='Compile Successfully';
        return response()->json($response);
      }
      public function cancelTest($classTest_id)
       {
         return view('admin.exam.cancel_popup',compact('classTest_id'));   
       }
       public function cancelTestFilter(Request $request)
       {
            $option=$request->id;
            $classTest_id=$request->classTest_id;
            return view('admin.exam.cancel_remaks',compact('option','classTest_id'));   
       }
       public function cancelTestFilterStore(Request $request)
       {  
           if ($request->option==1) {
            $rules=[  
            'Remarks' => 'required',  
            ];
            }
            elseif ($request->option==2) {
            $rules=[  
            'test_date' => 'required',  
            'Remarks' => 'required',  
            ];
            } 
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                $response=array();
                $response["status"]=0;
                $response["msg"]=$errors[0];
                return response()->json($response);// response as json
            }
           $classTest=ClassTest::find($request->classTest_id);
           if ($request->option==1) {
           $classTest->status=3; 
           }
           elseif ($request->option==2) {
           $classTest->status=2; 
           }
           $classTest->Remarks=$request->Remarks;
           $classTest->save();
           $response = array();
           $response['status'] = 1;
           $response['msg'] ='Cancel Successfully';
           return response()->json($response);
       } 
       public function reCancelTest($classTest_id)
       {
           $classTest=ClassTest::find($classTest_id);
           $classTest->status=1;
           $classTest->sms_test_status=1;
           $classTest->save();
           $response = array();
           $response['status'] = 1;
           $response['msg'] ='Re Cancel Successfully';
           return response()->json($response);
       } 

    public function rankSave($student_id,$exam_schedule_id){

        $markDetails =MarkDetail::where('exam_schedule_id',$exam_schedule_id)
                                ->whereIn('student_id',$student_id)
                                ->orderBy('marksobt','desc')
                                ->get(['student_id','marksobt']);
         
       $numbers = $markDetails->pluck('marksobt'); 
       $student = $markDetails->pluck('student_id'); 

       $arrlength = count($numbers);
       $rank = 1;
       $prev_rank = $rank;

       for($x = 0; $x < $arrlength; $x++) {

           if ($x==0) { 
               $this->rankSaveByStudentId($student[$x],$exam_schedule_id,$rank);
           }

          elseif ($numbers[$x] != $numbers[$x-1]) {
               $rank++;
               $prev_rank = $rank; 
               $this->rankSaveByStudentId($student[$x],$exam_schedule_id,$rank);
          }

          else{
               $rank++; 
               $this->rankSaveByStudentId($student[$x],$exam_schedule_id,$prev_rank);
           }
 
       }
        
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Exam\MarkDetail  $markDetail
     * @return \Illuminate\Http\Response
     */
    public function rankSaveByStudentId($student_id,$exam_schedule_id,$rank)
    {
        $marksDetail = MarkDetail::where('exam_schedule_id',$exam_schedule_id)->firstOrNew(['student_id'=>$student_id]); 
        $marksDetail->rank = $rank; 
        $marksDetail->save(); 
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Exam\MarkDetail  $markDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(MarkDetail $markDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Exam\MarkDetail  $markDetail
     * @return \Illuminate\Http\Response
     */
    public function sendSmsMarksFinal()
    {
         return view('admin.exam.send_sms_final');
    }
    public function sendSmsMarksFilter($condition_id)
    {
        if ($condition_id==1) {
         $classTests=classTest::where('sms_test_status',0)->get();  
        }
        elseif ($condition_id==2) {
         $classTests=classTest::where('sms_marks_status',0)->get();  
        } 
        return view('admin.exam.send_sms_final_filter',compact('classTests','condition_id'));
    }
    public function sendSmsMarksFilterSend(Request $request)
    {
       $user_id=Auth::guard('admin')->user()->id;
        if ($request->condition_id==2) {
         foreach ($request->class_test_id as $key => $id) {
          $sendSmsTest=DB::select(DB::raw("call up_sms_classTestmarks ('$id','$user_id','1','1','1')"));
          $cancelTest=ClassTest::find($id);
          $cancelTest->sms_marks_status=1;
          $cancelTest->save();    
         } 
       }else{
         foreach ($request->class_test_id as $key => $id) {
          $sendSmsTest=DB::select(DB::raw("call up_sms_classTestInform ('$id','$user_id','1','1','1','1')"));
          $cancelTest=ClassTest::find($id);
          $cancelTest->sms_test_status=1;   
          $cancelTest->save();
          if ($cancelTest->status==2) {
             $sendSmsTest=DB::select(DB::raw("call up_sms_classTestReschedule_cancel ('$id','$user_id','1','1','1','1')"));   
          }   
         } 
       }
        
        
        $response = array();
        $response['status'] = 1;
        $response['msg'] = 'SMS Send Successfully';
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Exam\MarkDetail  $markDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarkDetail $markDetail)
    {
        //
    }
}
