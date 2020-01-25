<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Model\EmailApi;
use App\Admin\Model\SmsApi;
use App\Events\SmsEvent;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\Sms\SmsTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class ApiSetingController extends Controller
{
   public function index()
   {
     return view('admin.apiSeting.index'); 
   }
   public function smsApiAdd($id=null)
   {
   	if ($id!=null) {
   	 $smsApi=SmsApi::find(Crypt::decrypt($id));
   	}else{
   	 $smsApi='';	
   	}
     return view('admin.apiSeting.smsApi.add_form',compact('smsApi')); 
   }
   public function smsApiStore(Request $request,$id=null)
   {  
	   	$rules=[
	    	  
	            'user_name' => 'required|max:50', 
	            'password' => 'required|max:50', 
	            'sender_name' => "required|max:6", 
	            'url' => "required|url", 
	       
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
		       $smsApi=SmsApi::firstOrNew(['id'=>$id]);  
		       $smsApi->user_id=$request->user_name;  
		       $smsApi->password=$request->password;  
		       $smsApi->url=$request->url;  
		       $smsApi->sender_id=$request->sender_name;  
           $smsApi->enableAutoSend=$request->enable_auto_send;  
           if ($smsApi->status==null) {
             $smsApi->status=0;
           }
		       $smsApi->last_updated_by=1;  
		       
	    	   $smsApi->save();
	    	$response=['status'=>1,'msg'=>'Created Successfully'];
	            return response()->json($response);
	        } 

         
   }
   public function smsApiList($value='')
   {
   	 $smsApis=SmsApi::orderBy('id','ASC')->get();
   	 return view('admin.apiSeting.smsApi.list',compact('smsApis'));   
   }
   public function smsApiDestroy($id)
   {
   	  $smsApi=SmsApi::find(Crypt::decrypt($id));
   	  $smsApi->delete();
   	  $response=['status'=>1,'msg'=>'Delete Successfully'];
	            return response()->json($response); 
   }
   public function emailApiAdd($id=null)
   {
   	if ($id!=null) {
   	 $emailApi=EmailApi::find(Crypt::decrypt($id));  
   	}else{
   	 $emailApi='';	
   	}
     return view('admin.apiSeting.emailApi.add_form',compact('emailApi')); 
   }
   public function emailApiStore(Request $request,$id=null)
   {
	   	$rules=[
	    	  
	            'host' => 'required|max:200',
	            'port' => 'required|max:4',
	            'username' => 'required|max:50', 
	            'password' => 'required|max:50', 
	            'encryption' => 'required|max:200',
	            'from' => 'required|max:50', 
               
	       
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
		       $smsApi=EmailApi::firstOrNew(['id'=>$id]);  
		       $smsApi->host=$request->host;  
		       $smsApi->port=$request->port;  
		       $smsApi->username=$request->username;  
		       $smsApi->password=$request->password;  
		       $smsApi->encryption=$request->encryption;  
		       $smsApi->mail_from=$request->from;
           $smsApi->enableAutoSend=$request->enable_auto_send;  
		       $smsApi->last_updated_by=1;  
		       if ($smsApi->status==null) {
             $smsApi->status=0;
           }
	    	   $smsApi->save();
	    	$response=['status'=>1,'msg'=>'Created Successfully'];
	            return response()->json($response);
	        } 

         
   }
   public function emailApiList($value='')
   {
   	 $smsApis=emailApi::orderBy('id','ASC')->get();
   	 return view('admin.apiSeting.emailApi.list',compact('smsApis'));   
   }
   public function emailApiDestroy($id)
   {
   	  $smsApi=EmailApi::find(Crypt::decrypt($id));  
   	  $smsApi->delete();
   	  $response=['status'=>1,'msg'=>'Delete Successfully'];
	            return response()->json($response); 
   }

   public function status($id,$condition_id)
   {
   	if ($condition_id==1) {
   		$smsApis=SmsApi::all();
   		foreach ($smsApis as $smsApi) {
   		 $smsApi=SmsApi::find($smsApi->id);  
   	     $smsApi->status=0;
   	     $smsApi->save();	 
   		}
   	    $smsApi=SmsApi::find($id);  
   	    $smsApi->status=1;
   	    $smsApi->save();
   	    $response=['status'=>1,'msg'=>'Successfully'];
	            return response()->json($response); 
   	}else{
        $emailApis=EmailApi::all();
         foreach ($emailApis as $emailApi) {
   	  $emailApi=EmailApi::find($emailApi->id);  
   	  $emailApi->status=0;
   	  $emailApi->save();
        }
        $emailApi=EmailApi::find($id);  
        $emailApi->status=1;
        $emailApi->save();
   	  $response=['status'=>1,'msg'=>'Successfully'];
	            return response()->json($response);	
   	}

   }
   public function testMessage(Request $request,$id)
   {
         return view('admin.apiSeting.test_form',compact('id'));
         
   }
   public function MessageSend(Request $request)
   { 
        if ($request->test==1) {
          event(new SmsEvent($request->mobile,'Api   Integration Successfully')); 
         }else{ 
            $message ='Test Api Integration Successfully';         
            $emailto = $request->email;         
            $subject = 'Test Api'; 
            $up_u=array(); 
            $up_u['medicalInfo']=$message;
            $up_u['subject']=$subject; 
            $up_u['data']='Test Api Integration Successfully'; 
            $mailHelper =new MailHelper(); 
            $mailHelper->mailsend('emails.message',$up_u,'No-Reply',$subject,$emailto,'info@eageskool.com',5); 
         }
         $response=['status'=>1,'msg'=>'send Successfully'];
              return response()->json($response); 

   }

}
