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
use App\Model\SubjectType;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $examSchedule =ExamSchedule::find($id);
        $students=Student::where('class_id',$examSchedule->class_id)->get();
        foreach ($students as  $value) {
         $smsTemplate = SmsTemplate::where('id',3)->first()->message;
         $message = $smsTemplate.' '.$examSchedule->examTerms->from_date.' '.$examSchedule->subjects->name;
         event(new SmsEvent($value->father_mobile,$message));     
         } 
         return  redirect()->back()->with(['message'=>'Send  Successfully','class'=>'success']);
    }
    public function sendEmail($id)
    {
        $examSchedule =ExamSchedule::find($id);
        $students=Student::where('class_id',$examSchedule->class_id)->get();
        foreach ($students as  $value) {
            $message = 'ExamSchedule';         
            $emailto = $value->email;         
            $subject = 'ExamSchedule'; 
            $up_u=array();
             
            $up_u['msg']=$message;
            $up_u['subject']=$subject;
                     
            $mailHelper =new MailHelper();
           
            $mailHelper->mailsend('emails.message',$up_u,'No-Reply',$subject,$emailto,'noreply@domain.com',5);  
         } 
         return  redirect()->back()->with(['message'=>'Send  Successfully','class'=>'success']);
        
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
