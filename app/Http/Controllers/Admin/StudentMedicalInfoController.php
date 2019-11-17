<?php

namespace App\Http\Controllers\admin;

use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\BloodGroup;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\Complextion;
use App\Model\DiscountType;
use App\Model\Document;
use App\Model\DocumentType;
use App\Model\Gender;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\Isoptional;
use App\Model\Minu;
use App\Model\ParentsInfo;
use App\Model\PaymentType;
use App\Model\Profession;
use App\Model\Religion;
use App\Model\SessionDate;
use App\Model\Sms\EmailTemplate;
use App\Model\Sms\SmsTemplate;
use App\Model\StudentDefaultValue;
use App\Model\StudentFee;
use App\Model\StudentMedicalInfo;
use App\Model\StudentSubject;
use App\Model\Subject;
use App\Model\SubjectType;
use App\Student;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

class StudentMedicalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $medical = new StudentMedicalInfo();
        $medical->alergey = $request->alergey;
        $medical->alergey_vacc = $request->alergey_vacc;
        $medical->bp_lower = $request->bp_lower;
        $medical->bp_uper = $request->bp_uper;
        $medical->bloodgroup_id = $request->bloodgroup_id;
        $medical->complextion = $request->complextion;
        $medical->dental = $request->dental;
        $medical->hb = $request->hb;
        $medical->height = $request->height;
        $medical->id_marks1 = $request->id_marks1;
        $medical->id_marks2 = $request->id_marks2;
        $medical->narration = $request->narration;
        $medical->ondate = $request->ondate == null ? $request->ondate : date('Y-m-d',strtotime($request->ondate));
        $medical->physical_handicapped = $request->physical_handicapped;
        $medical->student_id = $request->student_id;
        $medical->vision = $request->vision;
        $medical->weight = $request->weight; 
        $medical->isalgeric = $request->isalgeric; 
        $medical->ishandicapped = $request->ishandicapped; 
        $medical->handi_percent = $request->parcent; 
        $medical->save();
        if ($request->send_sms==1) {
        $this->medicalSendSms($request->student_id); 
        }
        if ($request->send_email==2) {
        return  $this->medicalSendEmail($request->student_id);
        }
       
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        }  

    }
    public function medicalSendSms($student_id)
    { 
        $user_id=Auth::guard('admin')->user()->id;
         $st=new Student();
         $student=$st->getStudentDetailsById($student_id);
         $messageId=StudentDefaultValue::where('user_id',$user_id)->first()->medical_message_id; 
         $smsTemplate = SmsTemplate::where('id',$messageId)->first()->message;

        $findword = ["#SN#", "#FN#", "#MN#"];
        $replaceword   = [$student->name, $student->parents[0]->parentInfo->name, $student->parents[1]->parentInfo->name];

         $message = str_replace($findword, $replaceword, $smsTemplate); 
         event(new SmsEvent($student->addressDetails->address->primary_mobile,$message)); 
        return  redirect()->back()->with(['message'=>'Send  Successfully','class'=>'success']);   
         
        
    }
    public function medicalSendEmail($student_id)
    {
        $medicalInfo =StudentMedicalInfo::where('student_id',$student_id)->orderBy('id','DESC')->first();
        $st=new Student();
         $student=$st->getStudentDetailsById($student_id);
         $documentUrl = Storage_path() . '/app/student/medical/';
         @mkdir($documentUrl, 0755, true);
         $pdf = PDF::loadView('admin.student.studentdetails.include.medical_send_email',compact('medicalInfo'))->save($documentUrl.'/'.$student->registration_no.'_medical.pdf'); 
         $url =$documentUrl.$student->registration_no.'_medical.pdf';
            $message =$medicalInfo;         
            $emailto = $student->addressDetails->address->primary_email;         
            $subject = 'Medical Details'; 
            $up_u=array(); 
            $up_u['medicalInfo']=$message;
            $up_u['subject']=$subject;
         
        $mailHelper =new MailHelper(); 
        $mailHelper->mailsendwithattachment('emails.message',$up_u,'No-Reply',$subject,$emailto,'noreply@esgekool.com',5,$url);
       $response=['status'=>1,'msg'=>'Send  Successfully'];
            return response()->json($response);
    }
    public function templateView($id)
    { 
         $user_id=Auth::guard('admin')->user()->id;
         if ($id==1) {
           $messageId=StudentDefaultValue::where('user_id',$user_id)->first()->birthday_message_id; 
           $emailId=StudentDefaultValue::where('user_id',$user_id)->first()->birthday_email_id; 
         }
         elseif ($id==2) {
           $messageId=StudentDefaultValue::where('user_id',$user_id)->first()->homework_message_id; 
           $emailId=StudentDefaultValue::where('user_id',$user_id)->first()->homework_email_id; 
         }
         elseif ($id==3) {
           $messageId=StudentDefaultValue::where('user_id',$user_id)->first()->classTest_message_id; 
           $emailId=StudentDefaultValue::where('user_id',$user_id)->first()->classTest_email_id; 
         }
         elseif ($id==4) {
           $messageId=StudentDefaultValue::where('user_id',$user_id)->first()->class_test_details_message_id; 
           $emailId=StudentDefaultValue::where('user_id',$user_id)->first()->class_test_details_email_id; 
         }
         elseif ($id==5) {
           $messageId=StudentDefaultValue::where('user_id',$user_id)->first()->timetable_message_id; 
           $emailId=StudentDefaultValue::where('user_id',$user_id)->first()->timetable_email_id; 
         }
         elseif ($id==6) {
           $messageId=StudentDefaultValue::where('user_id',$user_id)->first()->medical_message_id; 
           $emailId=StudentDefaultValue::where('user_id',$user_id)->first()->medical_email_id; 
         }
         elseif ($id==7) {
           $messageId=StudentDefaultValue::where('user_id',$user_id)->first()->absent_student_message_id; 
           $emailId=StudentDefaultValue::where('user_id',$user_id)->first()->absent_student_email_id; 
         } 
         $SMStemplateView=SmsTemplate::where('id',$messageId)->first();
         $EmailtemplateView=EmailTemplate::where('id',$emailId)->first();
         return view('admin.sms.smsTemplate.template_view',compact('SMStemplateView','EmailtemplateView'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\StudentMedicalInfo  $studentMedicalInfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
         $studentMedicalInfo=StudentMedicalInfo::find($id);
        return view('admin.student.studentdetails.include.medical_info_view',compact('studentMedicalInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentMedicalInfo  $studentMedicalInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $medicalInfo = StudentMedicalInfo::find($id);
         $student=$request->id; 
         $parentsType = array_pluck(GuardianRelationType::get(['id','name'])->toArray(),'name','id');
        $incomes = array_pluck(IncomeRange::get(['id','range'])->toArray(),'range', 'id');
        $documentTypes = array_pluck(DocumentType::get(['id','name'])->toArray(),'name', 'id');
        $subjectTypes = array_pluck(SubjectType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $isoptionals = array_pluck(Isoptional::get(['id','name'])->toArray(),'name', 'id');
        $bloodgroups = array_pluck(BloodGroup::orderBy('name','ASC')->get(['id','name'])->toArray(),'name', 'id');
        $professions = array_pluck(Profession::get(['id','name'])->toArray(),'name', 'id');
        $complextions=Complextion::orderBy('name','ASC')->get();  
       return view('admin.student.studentdetails.include.medical_info_edit',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups','complextions','medicalInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentMedicalInfo  $studentMedicalInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {  
        $rules=[
          
            
       
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
        $medical =StudentMedicalInfo::find($id);
        $medical->alergey = $request->alergey;
        $medical->alergey_vacc = $request->alergey_vacc;
        $medical->bp_lower = $request->bp_lower;
        $medical->bp_uper = $request->bp_uper;
        $medical->bloodgroup_id = $request->bloodgroup_id;
        $medical->complextion = $request->complextion;
        $medical->dental = $request->dental;
        $medical->hb = $request->hb;
        $medical->height = $request->height;
        $medical->id_marks1 = $request->id_marks1;
        $medical->id_marks2 = $request->id_marks2;
        $medical->narration = $request->narration;
        $medical->ondate = $request->ondate == null ? $request->ondate : date('Y-m-d',strtotime($request->ondate));
        $medical->physical_handicapped = $request->physical_handicapped;
        
        $medical->vision = $request->vision;
        $medical->weight = $request->weight;
        $medical->isalgeric = $request->isalgeric; 
        $medical->ishandicapped = $request->ishandicapped; 
        $medical->handi_percent = $request->parcent;
        
       $medical->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        }  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentMedicalInfo  $studentMedicalInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
          $medicalInfo = StudentMedicalInfo::find($id);
           

         $medicalInfo->delete();

         
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
    }
    public function medicalInfoAddForm(Request $request){
         $student=$request->id; 
         $parentsType = array_pluck(GuardianRelationType::get(['id','name'])->toArray(),'name','id');
        $incomes = array_pluck(IncomeRange::get(['id','range'])->toArray(),'range', 'id');
        $documentTypes = array_pluck(DocumentType::get(['id','name'])->toArray(),'name', 'id');
        $subjectTypes = array_pluck(SubjectType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $isoptionals = array_pluck(Isoptional::get(['id','name'])->toArray(),'name', 'id');
        $bloodgroups = array_pluck(BloodGroup::orderBy('name','ASC')->get(['id','name'])->toArray(),'name', 'id');
        $professions = array_pluck(Profession::get(['id','name'])->toArray(),'name', 'id'); 
        $complextions=Complextion::orderBy('name','ASC')->get(); 
        return view('admin.student.studentdetails.include.add_medical_info',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups','complextions'));
    }
    public function medicalInfoList(Request $request){ 
         $parentsType = array_pluck(GuardianRelationType::get(['id','name'])->toArray(),'name','id');
        $incomes = array_pluck(IncomeRange::get(['id','range'])->toArray(),'range', 'id');
        $documentTypes = array_pluck(DocumentType::get(['id','name'])->toArray(),'name', 'id');
        $subjectTypes = array_pluck(SubjectType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $isoptionals = array_pluck(Isoptional::get(['id','name'])->toArray(),'name', 'id');
        $bloodgroups = array_pluck(BloodGroup::get(['id','name'])->toArray(),'name', 'id');
        $professions = array_pluck(Profession::get(['id','name'])->toArray(),'name', 'id'); 
        $student=$request->id; 
        return view('admin.student.studentdetails.include.medical_info_list',compact('student','parentsType','incomes','documentTypes','isoptionals','sessions','subjectTypes','bloodgroups','professions'));

    }
    public function pdfGenerate($student_id)
    {

         
           $medicalInfos = StudentMedicalInfo::where('student_id',$student_id)->get(); 
           if (1==1) {
            $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.student.studentdetails.include.medical_info_pdf_generate',compact('medicalInfos','student_id'));
                return  $pdf->stream('student_medical.pdf');
            }else{   
               $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.student.studentdetails.include.medical_info_pdf_generate_blank',compact('medicalInfos'));
               return  $pdf->stream('student_medical.pdf');
              }    
            

          

            
           
          
    }
    public function studentMedicalAdd($value='')
    {
        $st= new Student();
        $students=$st->getAllStudents();
       return view('admin.student.studentdetails.studentMedical.view',compact('students'));  
    }
    public function studentShow(Request $request)
    { 
        $st= new Student();
        $student=$st->getStudentDetailsById($request->student_id);
        
        $response = array();
        $response['status'] = 1;
        $response['data']=view('admin.student.studentdetails.studentMedical.student_list',compact('student'))->render(); 
       return $response; 
    }
}
