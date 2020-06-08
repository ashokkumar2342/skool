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
        $response['msg'] = $importAttendance[0]->Result;
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
        $classTests=classTest::all();
        return view('admin.exam.send_sms_final_filter',compact('classTests'));
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
