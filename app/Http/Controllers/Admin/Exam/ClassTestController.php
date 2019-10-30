<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\ClassType;
use App\Model\Exam\ClassTest;
use App\Model\Sms\SmsTemplate;
use App\Model\StudentDefaultValue;
use App\Model\SubjectType;
use App\Student;
use Auth;
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
        $academicYears=AcademicYear::orderBy('id','ASC')->get();
        $classTypes =MyFuncs::getClassByHasUser();
        $subjects = SubjectType::orderBy('id','name')->get();
       
        return view('admin.exam.class_test',compact('classTypes','subjects','classTests','academicYears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addForm()
    {
        $academicYears=AcademicYear::orderBy('id','ASC')->get();
        $classes = MyFuncs::getClasses();
        $subjects = array_pluck(SubjectType::get(['id','name'])->toArray(),'name', 'id');
        $classTypes=MyFuncs::getClassByHasUser(); 
        return view('admin.exam.class_test_add_form',compact('classes','subjects','classTests','academicYears','classTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=Auth::guard('admin')->user()->id; 
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
        $classTest->academic_year_id = $request->academic_year_id;
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
        
        // $classTest->save();
        $st=new Student();
         $studentclassTestSendSms=$st->getStudentByClassSection($request->class,$request->section);
        
        if ($request->send_sms==1) { 
            foreach ($studentclassTestSendSms as  $value) {
                $StudentDefaultValue=StudentDefaultValue::where('user_id',$user_id)->first()->classTest_message_id;
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
                $StudentDefaultValue=StudentDefaultValue::where('user_id',$user_id)->first()->classTest_email_id;
                $message = $StudentDefaultValue;         
                $emailto = $value->addressDetails->address->primary_email;         
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
    public function tableShow(Request $request)
    {
           
        if ($request->has('academic_year_id') && ($request->has('class_id')&& ($request->has('section_id')&& ($request->has('subject'))))) {
            
          $classTests = ClassTest::where('academic_year_id',$request->academic_year_id)->where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('subject_id',$request->subject)->get(); 
        }elseif ($request->has('academic_year_id') && ($request->has('class_id')&& ($request->has('section_id')))) {
            
          $classTests = ClassTest::where('academic_year_id',$request->academic_year_id)->where('class_id',$request->class_id)->where('section_id',$request->section_id)->get(); 
        }elseif ($request->has('academic_year_id') && ($request->has('class_id'))) {
            
          $classTests = ClassTest::where('academic_year_id',$request->academic_year_id)->where('class_id',$request->class_id)->get(); 
        }elseif($request->has('academic_year_id')&&($request->has('subject'))){
          $classTests = ClassTest::where('academic_year_id',$request->academic_year_id)->where('subject_id',$request->subject)->get();
        }elseif($request->has('academic_year_id')){
          $classTests = ClassTest::where('academic_year_id',$request->academic_year_id)->get();
        }
        $response = array(); 
        $response['status'] = 1;
        $response['data'] = view('admin.exam.class_test_table_show',compact('classTests'))->render();
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
        $user_id=Auth::guard('admin')->user()->id;
        $st=new Student();
         $studentclassTestSendSms=$st->getStudentByClassSection($class_id,$section_id);
          
          $ClassTest=ClassTest::find($id);

        foreach ($studentclassTestSendSms as  $value) {
             $StudentDefaultValue=StudentDefaultValue::where('user_id',$user_id)->first()->classTest_message_id;
                $smsTemplate = SmsTemplate::where('id',$StudentDefaultValue)->first()->message;
                $findword = ["#SN#", "#FN#", "#MN#"];
                $replaceword   = [$value->name, $value->parents[0]->parentInfo->name, $value->parents[1]->parentInfo->name]; 
                $message = str_replace($findword, $replaceword, $smsTemplate); 
            $messages=$message.''.$ClassTest->test_date.' '.$ClassTest->subject.' '.$ClassTest->max_marks.' '.$ClassTest->discription;

            event(new SmsEvent($value->addressDetails->address->primary_mobile,$messages)); 
        } 
        return  redirect()->back()->with(['message'=>'Message Sent successfully','class'=>'success']);
    }
    public function sendEmail(ClassTest $classTest,$class_id,$section_id,$id)
    {   $user_id=Auth::guard('admin')->user()->id;
        $st=new Student();
         $studentclassTestSendSms=$st->getStudentByClassSection($class_id,$section_id);
        
      foreach ($studentclassTestSendSms as  $value) {
        $StudentDefaultValue=StudentDefaultValue::where('user_id',$user_id)->first()->classTest_email_id;
        $message = $StudentDefaultValue;         
        $emailto = $value->addressDetails->address->primary_email;         
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
