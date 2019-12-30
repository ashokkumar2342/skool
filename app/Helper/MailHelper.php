<?php
namespace App\Helpers;
use App\Admin;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailAttach;
use App\User; 

class MailHelper 
{
	

	/*public function mailsend($template,$data,$sender_name,$subject,$to,$from){
		Mail::to($template, $data, function ($message) use($sender_name,$subject,$to,$from) {
			$message->from($from, $sender_name);
			$message->subject($subject);
			$message->to($to);
		})->send(new SendEmailMailable());
	}*/

	public function mailsend($template,$data_mail,$sender_name,$subject,$to,$from,$delaytime){

		$array=array();
		$array['template']=$template;
		$array['data_mail']=$data_mail;
		$array['sender_name']=$sender_name;
		$array['subject']=$subject;
		$array['to']=$to;
		$array['from']=$from;

		$job=(new SendEmail($array))->delay(now()->addSeconds($delaytime));
		dispatch($job); 

	}

    public function activationmail($user_id)
	{
		$AppUsers=new Admin(); 
		$up_u=array();
		$up_u['token'] = str_random(64);
		$up_u['otp'] = mt_rand(100000,999999);
		$AppUsers->updateuserdetail($up_u,$user_id);
		$u_detail=$AppUsers->getdetailbyuserid($user_id);
		$up_u['name']=$u_detail->name;
		$user=$u_detail->email;
		$up_u['otp']=$u_detail->otp;
		$up_u['logo']=url("img/logo.png");
		$up_u['link']=url("passwordreset/".$u_detail->token);


		$this->mailsend('emails.userActivation',$up_u,'No-Reply','Account Activation',$user,mailTo(),20);
	}
	public function welcomemail($user_id,$array)
	{
			$AppUsers=new Admin(); 
		$up_u=array();
		$up_u['token'] = str_random(64);
		$up_u['otp'] = mt_rand(100000,999999);
		$AppUsers->updateuserdetail($up_u,$user_id);
		$u_detail=$AppUsers->getdetailbyuserid($user_id);
		$up_u['name']=$u_detail->name;
		$user=$u_detail->email;
		$up_u['otp']=$u_detail->otp;
		$up_u['logo']=url("img/logo.png");
		$up_u['link']=url("admin/login");
		$up_u['email']=$array['email']; 
		$up_u['password']=$array['password']; 
		$this->mailsend('emails.userActivation',$up_u,'No-Reply','Account Activation',$user,env('MAIL_USERNAME'),20);
	}

	 

	public function forgetmail($email)
	{
		$AppUsers=new Admin();
		$u_detail=$AppUsers->getdetailbyemail($email);
		$up_u=array();
		$up_u['token'] = str_random(64);		
		$AppUsers->updateuserdetail($up_u,$u_detail->user_id);		
		$up_u['name']=$u_detail->name;
		$up_u['email']=$u_detail->email;
		$user=$u_detail->email;
		// $up_u['otp']=$up_u['otp'];
		$up_u['logo']=url("img/logo.png");
		$up_u['link']=url("passwordreset/reset".$up_u['token']);


		$this->mailsend('emails.forgotPassword',$up_u,'No-Reply','Forget Password',$user,env('MAIL_USERNAME'),20);
	}

	public function resetnotification($user_id)
	{
		$AppUsers=new User();
		$u_detail=$AppUsers->getdetailbyuserid($user_id);

		$up_u=array();
		$up_u['name']=$u_detail->name;
		$up_u['logo']=url("img/logo.png");
		$user=$u_detail->email;
		$this->mailsend('emails.passwordChanged',$up_u,'No-Reply','Password Reset',$user,env('MAIL_USERNAME'),20);
	}

	

	public function securedevicealways($id)
	{
		$AppUsers=new User();
		$u_detail=$AppUsers->getdetailbyuserid($id);
		
		$up_u=array();

		if($u_detail->device_token!='')
		{
			$up_u['device_token'] = $u_detail->device_token;
			$AppUsers->updateuserdetail($up_u,$u_detail->user_id);
		}
		else
		{
			$up_u['device_token'] = mt_rand(100000,999999);
			$AppUsers->updateuserdetail($up_u,$u_detail->user_id);
		}
		
		
		$up_u['name']=$u_detail->name;
		$up_u['email']=$u_detail->email;
		$user=$u_detail->email;
		$up_u['otp']=$up_u['device_token'];
		$up_u['logo']=url("img/logo.png");

		$this->mailsend('emails.securedevicealways',$up_u,'No-Reply','New Device',$user,env('MAIL_USERNAME'),5);
	}

	public function securedevice($id,$array)
	{
		$AppUsers=new User();
		$u_detail=$AppUsers->getdetailbyuserid($id);
		
		$up_u=array();

		if($u_detail->device_token!='')
		{
			$up_u['device_token'] = $u_detail->device_token;
			$AppUsers->updateuserdetail($up_u,$u_detail->user_id);
		}
		else
		{
			$up_u['device_token'] = mt_rand(100000,999999);
			$AppUsers->updateuserdetail($up_u,$u_detail->user_id);
		}
		
		
		$up_u['name']=$u_detail->name;
		$up_u['browser']=$array['browser_name'];
		$up_u['os']=$array['platform_name'];
		$up_u['email']=$u_detail->email;
		$user=$u_detail->email;
		$up_u['otp']=$up_u['device_token'];
		$up_u['logo']=url("img/logo.png");

		$this->mailsend('emails.securedevice',$up_u,'No-Reply','New Device',$user,env('MAIL_USERNAME'),5);
	}

    public function mailsendwithattachment($template,$data_mail,$sender_name,$subject,$to,$from,$delaytime,$url=null){

		$array=array();
		$array['template']=$template;
		$array['data_mail']=$data_mail;
		$array['sender_name']=$sender_name;
		$array['subject']=$subject;
		$array['to']=$to;
		$array['from']=$from;
		$array['attach']=$url;

		$job=(new SendEmailAttach($array))->delay(now()->addSeconds($delaytime));
		dispatch($job);

		}
    

}