<?php

namespace App\Http\Controllers\Admin\Sms;

use App\Admin;
use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\Section;
use App\Model\Sms\EmailTemplate;
use App\Model\Sms\MessagePurpose;
use App\Model\Sms\SentSmsDetail;
use App\Model\Sms\SmsTemplate;
use App\Model\Sms\TemplateType;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;

class SmsController extends Controller
{
    public function index(){
        $classes = MyFuncs::getClasses(); 
    	return view('admin.sms.index',compact('classes'));
    }
    public function sendform($conditionId)
    {
        $messagePurposes=MessagePurpose::orderBy('name','ASC')->get();
        $classTypes=MyFuncs::getClassByHasUser();
        $st=new Student();
        $students=$st->getAllStudents();
        return view('admin.sms.send_form',compact('classTypes','messagePurposes','students','conditionId'));
    }
    public function sectionMultiple(Request $request)
    {
        $sections = MyFuncs::getSections($request->id);
        return view('admin.sms.section_select_box',compact('sections'));
    }
    //send SMS
    public function smsSend(Request $request){
    $rules=[
        'message_purpose' => 'required', 
    	'message' => 'required|max:1000', 
        'date_time' => 'required', 
       
    ]; 
    if ($request->conditionId==1) {
        $rules['class_id'] ='required';
        $class_id= implode(',',$request->class_id);
        $section_id='';    
        $student='';    
    }elseif ($request->conditionId==2) {
        $rules['class_id'] ='required';  
        $rules['section_id'] ='required';
        $class_id=$request->class_id; 
        $section_id= implode(',',$request->section_id);
        $student='';    
    }elseif ($request->conditionId==3) {
        $rules['student'] ='required';
        $student= implode(',',$request->student);  
        $section_id='';
        $class_id='';
    } 
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
        $errors = $validator->errors()->all();
        $response=array();
        $response["status"]=0;
        $response["msg"]=$errors[0];
        return response()->json($response);// response as json
    }
    $admin=Auth::guard('admin')->user();
    $date_time=date("Y-m-d h:i:s",strtotime($request->date_time)); 
     DB::select(DB::raw("call up_sendsms_general_student ('$request->conditionId','$class_id','$section_id','$student','$request->message_purpose','$request->message','$date_time','$admin->id')"));  
    $response = array();
    $response['status'] = 1;
    $response['msg'] = 'Message Sent successfully'; 
    return $response;
    } 
	//quickSms
    public function quickSms(Request $request){ 
        $rules=[
            'message' => 'required|max:1000', 
            'number' => 'required', 
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        } 
        $message = $request->message;         
        $mobile = $request->number;         
        event(new smsEvent($mobile,$message));
        $response = array();
        $response['status'] = 1;
        $response['msg'] = 'Message Sent successfully';
        return $response;
    }
    //quickSms
    public function quickEmail(Request $request){  
        $rules=[
            'message' => 'required|max:1000', 
            'emailto' => 'required|email', 
            'subject' => 'string|nullable', 
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        } 

       $message = $request->message;         
        $emailto = $request->emailto;         
        $subject = $request->subject; 
        $up_u=array();
         
        $up_u['msg']=$message;
        $up_u['subject']=$subject;
                 
        $mailHelper =new MailHelper();
       
        $mailHelper->mailsend('emails.message',$up_u,'No-Reply',$subject,$emailto,'noreply@domain.com',5);
        $response = array();
        $response['status'] = 1;
        $response['msg'] = 'Message Sent successfully';
        return $response;
    }

    //report
    public function smsReport(Request $request){
         $reportType=$request->report_type;
        $messagePurposes=MessagePurpose::orderBy('name','ASC')->get();
        $admins=Admin::orderBy('first_name','ASC')->get();
        $students=Student::orderBy('registration_no','ASC')->get();
        $classes = MyFuncs::getClassByHasUser();
    	return view('admin.sms.smsReport',compact('reportType','messagePurposes','admins','students','classes'));
    }
    public function smsReportType(Request $request)
    {   
        $reportType=$request->id;
        $messagePurposes=MessagePurpose::orderBy('name','ASC')->get();
        $admins=Admin::orderBy('first_name','ASC')->get();
        $students=Student::orderBy('registration_no','ASC')->get();
        $sections =Section::orderBy('class_id','ASC')->orderBy('section_id','ASC')->get();
        return view('admin.sms.report_type_page',compact('reportType','messagePurposes','admins','students','sections'));
    }
    public function smsReportFilter(Request $request)
    {    $conditionId=$request->sent_to;
          if ($request->sent_to==0) {
           $sentSmsDetails=DB::select(DB::raw("call up_sent_sms_report ($request->sent_to,'$request->message_purpose_id','$request->sent_by','0','0','$request->mobile_no','$request->from_date','$request->to_date')")); 
          }
          elseif ($request->sent_to==1) {
              $sentSmsDetails=DB::select(DB::raw("call up_sent_sms_report ($request->sent_to,'$request->message_purpose_id','$request->sent_by','0','$request->class_id','$request->mobile_no','$request->from_date','$request->to_date')")); 
          }
          elseif ($request->sent_to=3) {
             $sentSmsDetails=DB::select(DB::raw("call up_sent_sms_report ($request->sent_to,'$request->message_purpose_id','$request->sent_by','$request->user_id','0','$request->mobile_no','$request->from_date','$request->to_date')")); 
          }

            $response=array();
            $response["status"]=1;
            $response["data"]=view('admin.sms.sms_history_table',compact('sentSmsDetails','conditionId'))->render(); 
            return $response;
         
    }
//----------------------------------------sms-template-------------------------------------------------------//
    public function smsTemplate(){
        $messagePurposes=MessagePurpose::all();
        return view('admin.sms.smsTemplate.list',compact('messagePurposes'));
    }
    public function smsTemplateOnchange(Request $request){
        $message_purpose_id=$request->id;
        $smsTemplates=SmsTemplate::where('message_purpose_id',$request->id)->get();
        $messagePurposes=MessagePurpose::find($message_purpose_id); 
         return view('admin.sms.smsTemplate.table',compact('smsTemplates','message_purpose_id','messagePurposes'));
    }
    public function smsTemplateAdd($id){
        $messagePurposes=MessagePurpose::find($id); 
        return view('admin.sms.smsTemplate.add_form',compact('message_purpose_id','messagePurposes'));
    }
      public function smsTemplateStore(Request $request){ 
       
      $rules=[
          
            'name' => 'required|max:50|unique:sms_templates', 
            'message' => 'required', 
            
       
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
        
        $smsTemplate=new SmsTemplate();
        $smsTemplate->message_purpose_id=$request->message_purpose_id; 
        $smsTemplate->name=$request->name;
        $smsTemplate->message=$request->message;
        $smsTemplate->discription=$request->description;
         
        $smsTemplate->save();
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    } 
    public function smsTemplateEdit($id)
    {    
        $smsTemplates=SmsTemplate::findOrFail(Crypt::decrypt($id));
        return view('admin.sms.smsTemplate.edit',compact('smsTemplates','templteNames'));
    } public function smsTemplateView($id)
    {  
        $smsTemplates=SmsTemplate::find($id);
        return view('admin.sms.smsTemplate.view',compact('smsTemplates'));
    }
      public function smsTemplateDestroy($id)
    {
         $smsTemplates=SmsTemplate::findOrFail(Crypt::decrypt($id));
         $smsTemplates->delete();
         $response=['status'=>1,'msg'=>'Delete Successfully'];
            return response()->json($response);
          
    }
    public function smsTemplateStatus($id)
    {
        DB::select(DB::raw("call up_set_message_default ($id)"));
        $response=['status'=>1,'msg'=>'Default Set Successfully'];
            return response()->json($response); 
          
    }

    public function smsTemplateUpdate(Request $request,$id){  
   $rules=[
          
            'name' => 'required|max:50|unique:sms_templates,name,'.$id, 
            'message' => 'required', 
            
       
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
        $smsTemplate=SmsTemplate::find($id);
        $smsTemplate->name=$request->name;
        $smsTemplate->message=$request->message;
        $smsTemplate->discription=$request->description;
         
        $smsTemplate->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    } 

    public function emailTemplate()
    {    $messagePurposes=MessagePurpose::all();  
         return view('admin.sms.emailTemplate.list',compact('messagePurposes'));
    }
    public function emailTemplateOnchange(Request $request){
        $message_purpose_id=$request->id;
        $emailTemplates=EmailTemplate::where('message_purpose_id',$request->id)->get();
         $messagePurposes=MessagePurpose::find($message_purpose_id); 
         return view('admin.sms.emailTemplate.table',compact('emailTemplates','message_purpose_id','messagePurposes'));
    }
    public function emailTemplateAddForm($id){

        $messagePurposes=MessagePurpose::find($id); 
        return view('admin.sms.emailTemplate.add_form',compact('messagePurposes'));
        
    }
    public function emailTemplateStore(Request $request,$id)
    {  
        $rules=[
          
           
            'name' => 'required', 
            'message' => 'required', 
            'subject' => 'required', 
            
       
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
         // $smsTemplate=EmailTemplate::where('template_type_id',$request->name)->count();
         // if ($smsTemplate==2) {
         //   $response=['status'=>0,'msg'=>'2 Template Already Create'];
         //    return response()->json($response);
         // }

        $smsTemplate=new EmailTemplate();
        $smsTemplate->message_purpose_id=$id;
        $smsTemplate->message=$request->message;
        $smsTemplate->subject=$request->subject;
        $smsTemplate->name=$request->name;
         
        $smsTemplate->save();
        $response=['status'=>1,'msg'=>'Create Successfully'];
            return response()->json($response);
        } 
    }
    public function emailTemplateTable(Request $request,$id){
       
         $EmailTemplates=EmailTemplate::where('template_type_id',$id)->get();
         return view('admin.sms.emailTemplate.table',compact('EmailTemplates'));
    }
    public function emailTemplateEdit($id)
    {
        
         $EmailTemplates=EmailTemplate::findOrFail(crypt::decrypt($id));

         return view('admin.sms.emailTemplate.edit',compact('EmailTemplates'));
    }
    public function emailTemplateUpdate(Request $request,$id,$message_purpose_id)
    {
        $rules=[
          
            
            'name' => 'required', 
            'message' => 'required', 
            'subject' => 'required', 
            
       
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
        $smsTemplate=  EmailTemplate::find($id);
        $smsTemplate->message_purpose_id=$message_purpose_id;
        $smsTemplate->message=$request->message;
        $smsTemplate->subject=$request->subject;
        $smsTemplate->name=$request->name;
         
        $smsTemplate->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }
    public function emailTemplateView($id)
    {  
        $smsTemplates=EmailTemplate::find($id);
        return view('admin.sms.emailTemplate.view',compact('smsTemplates'));
    }
    public function emailTemplateDestroy($id)
    {
         $smsTemplates=EmailTemplate::findOrFail(Crypt::decrypt($id));
         $smsTemplates->delete();
         return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
     public function emailTemplateStatus($id)
    { 
        DB::select(DB::raw("call up_set_email_default ($id)"));
          
          
    }
}
