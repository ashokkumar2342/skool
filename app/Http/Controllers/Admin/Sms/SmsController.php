<?php

namespace App\Http\Controllers\Admin\Sms;

use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\Sms\EmailTemplate;
use App\Model\Sms\SmsTemplate;
use App\Model\Sms\TemplateType;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class SmsController extends Controller
{
    public function index(){
        $classes = MyFuncs::getClasses(); 
    	return view('admin.sms.smsForm',compact('classes'));
    }
    //send SMS
    public function smsSend(Request $request){  
    $rules=[
    	'message' => 'required|max:1000', 
    ]; 
    if (empty($request->mobile) && empty($request->class)) {
      $rules['mobile'] ='required';  
    }
    if (empty($request->class) && empty($request->mobile)) {
      $rules['class'] ='required';  
    } 
    
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
        $errors = $validator->errors()->all();
        $response=array();
        $response["status"]=0;
        $response["msg"]=$errors[0];
        return response()->json($response);// response as json
    } 
    
    
    if (!empty($request->class) && empty($request->section)) {
        $students = Student::where('class_id',$request->class)->get();
        foreach ($students as $student) {
           $message = $request->message;         
        event(new smsEvent($student->father_mobile,$message)); 
        }
    }
    if (!empty($request->class) && !empty($request->section)) {
        $students = Student::where('class_id',$request->class)->where('section_id',$request->section)->get();
        foreach ($students as $student) {
           $message = $request->message;         
        event(new smsEvent($student->father_mobile,$message)); 
        }
    }
    if (!empty($request->mobile)) {
        $message = $request->message;         
        $mobile = $request->mobile;         
        event(new smsEvent($mobile,$message));
    }
     
        
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
    public function smsReport(){
    	return view('admin.sms.smsReport');
    }
//----------------------------------------sms-template-------------------------------------------------------//
    public function smsTemplate(){
        return view('admin.sms.smsTemplate.list');
    }
    public function smsTemplateAdd(){
        $templteNames=TemplateType::orderBy('id','ASC')->get();
        return view('admin.sms.smsTemplate.add_form',compact('templteNames'));
    }
      public function smsTemplateStore(Request $request){  
   $rules=[
          
            'name' => 'required', 
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
        $smsTemplate->template_type_id=$request->name;
        $smsTemplate->message=$request->message;
         
        $smsTemplate->save();
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    } 
    public function smsTemplateTable(Request $request){
         $smsTemplates=SmsTemplate::all();
         return view('admin.sms.smsTemplate.table',compact('smsTemplates'));
    }

    public function smsTemplateEdit($id)
    {   
        $smsTemplates=SmsTemplate::findOrFail(Crypt::decrypt($id));
        return view('admin.sms.smsTemplate.edit',compact('smsTemplates'));
    } public function smsTemplateView($id)
    {   
        $smsTemplates=SmsTemplate::find($id);
        return view('admin.sms.smsTemplate.view',compact('smsTemplates'));
    }
      public function smsTemplateDestroy($id)
    {
         $smsTemplates=SmsTemplate::findOrFail(Crypt::decrypt($id));
         $smsTemplates->delete();
         return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }

    public function smsTemplateUpdate(Request $request,$id){  
   $rules=[
          
            'name' => 'required', 
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
         
        $smsTemplate->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    } 

    public function emailTemplate()
    {
         return view('admin.sms.emailTemplate.list');
    }
    public function emailTemplateAddForm(){
        $templteNames=TemplateType::orderBy('id','ASC')->get();
        return view('admin.sms.emailTemplate.add_form',compact('templteNames'));
    }
    public function emailTemplateStore(Request $request)
    {
        $rules=[
          
            'name' => 'required', 
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
        $smsTemplate=new EmailTemplate();
        $smsTemplate->template_type_id=$request->name;
        $smsTemplate->message=$request->message;
         
        $smsTemplate->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }
    public function emailTemplateTable(Request $request){
         $EmailTemplates=EmailTemplate::all();
         return view('admin.sms.emailTemplate.table',compact('EmailTemplates'));
    }
}
