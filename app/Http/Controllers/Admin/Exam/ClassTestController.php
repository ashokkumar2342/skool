<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Events\SmsEvent;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Exam\ClassTest;
use App\Model\Sms\SmsTemplate;
use App\Model\SubjectType;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class ClassTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $subjects = array_pluck(SubjectType::get(['id','name'])->toArray(),'name', 'id');
        $classTests = ClassTest::All();
        return view('admin.exam.class_test',compact('classes','subjects','classTests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        'class' => 'required|max:30', 
        'section' => 'required|max:30', 
        'test_date' => 'required|max:30',  
        'sylabus' => 'nullable|mimes:pdf|max:2048',
              
          
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }

        $file = $request->file('sylabus'); 
        if (!$file==null) {
           $file->store('public/class_test'); 
        }
        
  
        $classTest = new ClassTest();
        $classTest->class_id = $request->class;
        $classTest->section_id = $request->section;
        $classTest->test_date = $request->test_date;
         
        $classTest->max_marks = $request->max_marks;
        $classTest->subject_id = $request->subject;
        $classTest->discription = $request->discription;
         
        $classTest->is_include_term_exam = 1;
        if (!$file==null) {
           $classTest->sylabus = $file->hashName();
        }
        
        $classTest->save();
        $studentclassTestSendSms=Student::where('class_id',$request->class)->where('section_id',$request->section)->get();
        if ($request->send_sms==1) { 
            foreach ($studentclassTestSendSms as  $value) {
                $smsTemplate = SmsTemplate::where('template_type_id',3)->first()->message; 
                $message=$smsTemplate.''.$request->test_date.' '.$request->subject.' '.$request->max_marks.' '.$request->discription;

            event(new SmsEvent($value->father_mobile,$message)); 
             } 
        }
        if ($request->send_email==2) {
            
             foreach ($studentclassTestSendSms as  $value) {
                $message = 'ClassText';         
                $emailto = $value->email;         
                $subject = 'ClassText'; 
                $up_u=array();
                 
                $up_u['msg']=$message;
                $up_u['subject']=$subject;
                         
                $mailHelper =new MailHelper();
               
                $mailHelper->mailsend('emails.message',$up_u,'No-Reply',$subject,$emailto,'noreply@domain.com',5);
             }
        }

        $response = array();
        $response['msg'] = 'Submit Successfully';
        $response['status'] = 1;
        return response()->json($response);


    }
     

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Exam\ClassTest  $classTest
     * @return \Illuminate\Http\Response
     */
    public function sendSms(ClassTest $classTest,$class_id,$section_id,$id)
    {
          $studentclassTestSendSms=Student::where('class_id',$class_id)->where('section_id',$section_id)->get();
          $ClassTest=ClassTest::find($id);

        foreach ($studentclassTestSendSms as  $value) {
            $smsTemplate = SmsTemplate::where('template_type_id',3)->first()->message; 
            $message=$smsTemplate.''.$ClassTest->test_date.' '.$ClassTest->subject.' '.$ClassTest->max_marks.' '.$ClassTest->discription;

            event(new SmsEvent($value->father_mobile,$message)); 
        } 
        return  redirect()->back()->with(['message'=>'Message Sent successfully','class'=>'success']);
    }
    public function sendEmail(ClassTest $classTest,$class_id,$section_id,$id)
    {
        $studentclassTestSendSms=Student::where('class_id',$class_id)->where('section_id',$section_id)->get();
      foreach ($studentclassTestSendSms as  $value) {
        $message = 'ClassText';         
        $emailto = $value->email;         
        $subject = 'ClassText'; 
        $up_u=array();
         
        $up_u['msg']=$message;
        $up_u['subject']=$subject;
                 
        $mailHelper =new MailHelper();
       
        $mailHelper->mailsend('emails.message',$up_u,'No-Reply',$subject,$emailto,'noreply@domain.com',5);
     }
        return  redirect()->back()->with(['message'=>'Email Sent successfully','class'=>'success']); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Exam\ClassTest  $classTest
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassTest $classTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Exam\ClassTest  $classTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassTest $classTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Exam\ClassTest  $classTest
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
   {

       $ClassTest = ClassTest::findOrFail(Crypt::decrypt($id));
       $ClassTest->delete();
       return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
   }
}
