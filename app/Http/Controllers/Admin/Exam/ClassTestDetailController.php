<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Events\SmsEvent;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Exam\ClassTest;
use App\Model\Exam\ClassTestDetail;
use App\Model\Exam\Grade;
use App\Model\Sms\SmsTemplate;
use App\Model\StudentDefaultValue;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Auth;

class ClassTestDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $academicYears=AcademicYear::orderBy('id','ASC')->get();
        $classTests = ClassTest::all();
        $students = Student::all();
        $classTestDetails = ClassTestDetail::all();         
        return view('admin.exam.class_test_details',compact('classTestDetails','students','classTests','academicYears'));
    }

    public function academicYearWiseClassTest(Request $request)
    {
      
      $classTests = CLassTest::where('academic_year_id',$request->academic_year_id)->get();
      return view('admin.exam.class_test_value',compact('classTests','academicYears'));
    }
    public function searchStudent(Request $request)
    { 
         $classTest = CLassTest::find($request->id);
         $classTestDetails = ClassTestDetail::where('class_test_id',$request->id)->get();
         $students = Student::where('class_id',$classTest->class_id)->where('section_id',$classTest->section_id)->get();
         return view('admin.exam.student_details',compact('students','classTest','classTestDetails'))->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $user_id=Auth::guard('admin')->user()->id; 
        $rules=[
        'class_test_id' => 'required|max:30', 
        'student_id' => 'required|max:30', 
        'marksobt' => 'required|array|between:1,10',  
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        $classTestmaxmarks=ClassTest::find($request->class_test_id)->max_marks;
        foreach ($request->student_id as $key => $value) {
             $max =$classTestmaxmarks;
             $marObt =$request->marksobt[$key];
             $percentile=($marObt/$max)*100;
          $classTestDetail = ClassTestDetail::firstOrNew(['student_id'=>$value,'class_test_id'=>$request->class_test_id]); 
         $grade =Grade::where('from_marks','<=',$request->marksobt[$key])->first();
          $classTestDetail->class_test_id = $request->class_test_id;
          $classTestDetail->student_id = $value;
          $classTestDetail->marksobt = $request->marksobt[$key];     
          $classTestDetail->any_remarks = $request->any_remarks[$key]; 
          $classTestDetail->grade = $grade->id; 
          $classTestDetail->percentile = $percentile; 
          $classTestDetail->save();
         }
         $st=new Student();
         $studentclassTestSendSms=$st->getStudentDetailsByArrId($request->student_id);
        if ($request->send_sms==1) { 
            foreach ($studentclassTestSendSms as  $value) {
                $StudentDefaultValue=StudentDefaultValue::where('user_id',$user_id)->first()->class_test_details_message_id;
                $smsTemplate = SmsTemplate::where('id',$StudentDefaultValue)->first()->message;
                $findword = ["#SN#", "#FN#", "#MN#"];
                $replaceword   = [$value->name, $value->parents[0]->parentInfo->name, $value->parents[1]->parentInfo->name]; 
                $message = str_replace($findword, $replaceword, $smsTemplate); 
                $messages=$message.''.$request->test_date.' '.$request->subject.' '.$request->max_marks.' '.$request->discription;

            event(new SmsEvent($value->addressDetails->address->primary_mobile,$messages)); 
             } 
        }
        if ($request->send_email==2) {
            
             foreach ($studentclassTestSendSms as  $value) {
               $StudentDefaultValue=StudentDefaultValue::where('user_id',$user_id)->first()->class_test_details_email_id;
                $message = $StudentDefaultValue;        
                $emailto = $value->addressDetails->address->primary_email;         
                $subject = 'ClassTextDetails'; 
                $up_u=array();
                 
                $up_u['msg']=$message;
                $up_u['subject']=$subject;
                         
                $mailHelper =new MailHelper();
               
                $mailHelper->mailsend('emails.message',$up_u,'No-Reply',$subject,$emailto,'noreply@domain.com',5);
             }
        }
      
        
         $this->rankSave($request->student_id,$request->class_test_id);
        $response = array();
        $response['msg'] = 'Submit Successfully';
        $response['status'] = 1;
        return response()->json($response);
    }
     public function rankSave($student_id,$class_test_id){

        $markDetails =ClassTestDetail::where('class_test_id',$class_test_id)->whereIn('student_id',$student_id)
                                ->orderBy('marksobt','desc')
                                ->get(['student_id','marksobt']);
         
       $numbers = $markDetails->pluck('marksobt'); 
       $student = $markDetails->pluck('student_id'); 

       $arrlength = count($numbers);
       $rank = 1;
       $prev_rank = $rank;

       for($x = 0; $x < $arrlength; $x++) {

           if ($x==0) { 
               $this->rankSaveByStudentId($student[$x],$class_test_id,$rank);
           }

          elseif ($numbers[$x] != $numbers[$x-1]) {
               $rank++;
               $prev_rank = $rank; 
               $this->rankSaveByStudentId($student[$x],$class_test_id,$rank);
          }

          else{
               $rank++; 
               $this->rankSaveByStudentId($student[$x],$class_test_id,$prev_rank);
           }
 
       }
   }

    public function rankSaveByStudentId($student_id,$class_test_id,$rank)
    {
        $marksDetail = ClassTestDetail::where('class_test_id',$class_test_id)->firstOrNew(['student_id'=>$student_id]); 
        $marksDetail->rank = $rank; 
        $marksDetail->save(); 
       
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Exam\ClassTestDetail  $classTestDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ClassTestDetail $classTestDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Exam\ClassTestDetail  $classTestDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassTestDetail $classTestDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Exam\ClassTestDetail  $classTestDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassTestDetail $classTestDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Exam\ClassTestDetail  $classTestDetail
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
   { 
       $ClassTestDetail = ClassTestDetail::findOrFail(Crypt::decrypt($id));
       $ClassTestDetail->delete();
       return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
   }
   public function todayClassTest()
   {
       $classTests=ClassTest::where('test_date',date('Y-m-d'))->orderBy('id','ASC')->get();
       return view('admin.exam.classTestDashboard.today',compact('classTests'));
   }
   public function upcomingClassTest()
   {
       
         $classTestsComing=date('Y-m-d',strtotime(date('Y-m-d') ."+1 days")); 
         $classTestsComings=date('Y-m-d',strtotime($classTestsComing ."+7 days")); 
         $classTests=ClassTest::whereBetween('test_date', [$classTestsComing,$classTestsComings])->get();
       return view('admin.exam.classTestDashboard.upcoming',compact('classTests'));
   }
}
