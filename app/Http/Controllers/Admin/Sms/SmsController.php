<?php

namespace App\Http\Controllers\Admin\Sms;

use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
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
}