<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\ClassType;
use App\Model\Exam\ExamSchedule;
use App\Model\Exam\ExamTerm;
use App\Model\Sms\SmsTemplate;
use App\Model\StudentDefaultValue;
use App\Model\SubjectType;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class ExamScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicYears=AcademicYear::orderBy('id','ASC')->get();
        $classes = MyFuncs::getClasses();
        $subjects = array_pluck(SubjectType::get(['id','name'])->toArray(),'name', 'id');
        $examTerms = ExamTerm::all();
        $examSchedules = ExamSchedule::all();
        
        return view('admin.exam.exam_schedule',compact('classes','subjects','examTerms','examSchedules','academicYears'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules=[
        'exam_term' => 'required|max:30', 
        'class' => 'required|max:30',  
        'subject' => 'required|max:30',  
        'on_date' => 'required|max:30',  
        'max_marks' => 'required|max:30',  
        'pass_marks' => 'required|max:30',  
        'fail_marks' => 'required|max:30',             
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        } 
        $examSchedule = new ExamSchedule();
        $examSchedule->academic_year_id = $request->academic_year_id;
        $examSchedule->class_id = $request->class;
        $examSchedule->subject_id = $request->subject;
        $examSchedule->exam_term_id = $request->exam_term;
        $examSchedule->on_date = $request->on_date; 
        $examSchedule->max_marks = $request->max_marks;
        $examSchedule->pass_marks = $request->pass_marks;
        $examSchedule->fail_marks = $request->fail_marks; 
        $examSchedule->save(); 
        $response = array();
        $response['msg'] = 'Submit Successfully';
        $response['status'] = 1;
        return response()->json($response);
    }



    public function sendSms($id)
    {
        $user_id=Auth::guard('admin')->user()->id;
        $examSchedule =ExamSchedule::find($id);
         $st=new Student();
         $students=$st->getStudentByClassMultiselectId([$examSchedule->class_id]);
         
        foreach ($students as  $value) {
         $StudentDefaultValue=StudentDefaultValue::where('user_id',$user_id)->first()->class_test_details_message_id;
        $smsTemplate = SmsTemplate::where('id',$StudentDefaultValue)->first()->message;
        $findword = ["#SN#", "#FN#", "#MN#"];
        $replaceword   = [$value->name, $value->parents[0]->parentInfo->name, $value->parents[1]->parentInfo->name]; 
        $message = str_replace($findword, $replaceword, $smsTemplate);
         $messages = $message.' '.$examSchedule->examTerms->from_date.' '.$examSchedule->subjects->name;
         event(new SmsEvent($value->addressDetails->address->primary_mobile,$messages));     
         } 
         return  redirect()->back()->with(['message'=>'SMS Send  Successfully','class'=>'success']);
    }
    public function sendEmail($id)
    {
        $user_id=Auth::guard('admin')->user()->id;
        $examSchedule =ExamSchedule::find($id);
         $st=new Student();
         $students=$st->getStudentByClassMultiselectId([$examSchedule->class_id]);
            $StudentDefaultValue=StudentDefaultValue::where('user_id',$user_id)->first()->class_test_details_message_id;
        foreach ($students as  $value) {
            $message = $StudentDefaultValue;       
            $emailto = $value->addressDetails->address->primary_email;         
            $subject = 'ExamSchedule'; 
            $up_u=array(); 
            $up_u['msg']=$message;
            $up_u['subject']=$subject; 
            $mailHelper =new MailHelper(); 
            $mailHelper->mailsend('emails.message',$up_u,'No-Reply',$subject,$emailto,'noreply@domain.com',5);  
         } 
         return  redirect()->back()->with(['message'=>'Email Send  Successfully','class'=>'success']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Exam\ExamSchedule  $examSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(ExamSchedule $examSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Exam\ExamSchedule  $examSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamSchedule $examSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Exam\ExamSchedule  $examSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamSchedule $examSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Exam\ExamSchedule  $examSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamSchedule $examSchedule)
    {
        //
    }
}
