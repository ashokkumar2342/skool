<?php

namespace App\Console\Commands;

use App\Events\SmsEvent;
use App\Helpers\MailHelper;
use App\Jobs\SendSmsJob;
use App\Model\Sms\EmailTemplate;
use App\Model\Sms\SentEmailDetail;
use App\Model\Sms\SentSmsDetail;
use Illuminate\Console\Command;
class SendSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Sms ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $id=SentSmsDetail::where('sent_status',0)->pluck('id')->toArray(); 
       $sentSmsDetails=SentSmsDetail::whereIn('id',$id)->update(['sent_status'=>2]); 
       $sentSmsDetailsFinalDatas=SentSmsDetail::where('sent_status',2)->get(); 
       foreach ($sentSmsDetailsFinalDatas as $sentSmsDetailsFinalDatas) {
        event(new smsEvent($sentSmsDetailsFinalDatas->mobileno,$sentSmsDetailsFinalDatas->smstext)); 
          // $array=array();       
          // $array['mobile']=$sentSmsDetailsFinalDatas->mobileno;
          // $array['message']=$sentSmsDetailsFinalDatas->smstext;
          // $job=(new SendSmsJob($array))->delay(now()->addSeconds(5));
          // dispatch($job); 

       }
       $arrId =$sentSmsDetailsFinalDatas->pluck('id')->toArray();
       $sentSmsDetails=SentSmsDetail::whereIn('id',$arrId)->update(['sent_status'=>1]);

      //send email 
      $id=SentEmailDetail::where('sent_status',0)->pluck('id')->toArray(); 
      $sentEmailDetails=SentEmailDetail::whereIn('id',$id)->update(['sent_status'=>2]); 
      $sentEmailDetailsFinalDatas=SentEmailDetail::where('sent_status',2)->get(); 
      foreach ($sentEmailDetailsFinalDatas as $sentEmailDetailsFinalData) {
         
        
        
         // $documentUrl = Storage_path() . '/app/student/birthday/';
         // @mkdir($documentUrl, 0755, true);
         // $pdf = PDF::loadView('admin.student.birthday.birthday_card',compact('student','message','id'))->save($documentUrl.'/'.$student->registration_no.'_birthday_card.pdf'); 
         // $url =$documentUrl.$student->registration_no.'_birthday_card.pdf';
            $message =$sentEmailDetailsFinalData->email_text;         
            $emailto = $sentEmailDetailsFinalData->email_id;         
            $subject = $sentEmailDetailsFinalData->email_subject;
            $template_purpose =$sentEmailDetailsFinalData->purpose;
            $temp_name='';
            if ($template_purpose==1) {
              $temp_name='message';
            }
            $up_u=array(); 
            $up_u['data']=$message;
            
         
        $mailHelper =new MailHelper(); 
        $mailHelper->mailsend('emails.'.$temp_name,$up_u,'No-Reply',$subject,$emailto,'noreply@esgekool.com',5);
         }








         $array=array();       
         $array['mobile']=$sentSmsDetailsFinalDatas->mobileno;
         $array['message']=$sentSmsDetailsFinalDatas->smstext;
         $job=(new SendSmsJob($array))->delay(now()->addSeconds(5));
         dispatch($job); 
         event(new smsEvent($sentEmailDetailsFinalData->mobileno,$sentEmailDetailsFinalData->smstext)); 

      }
      $arrId =$sentSmsDetailsFinalDatas->pluck('id')->toArray();
      $sentSmsDetails=SentSmsDetail::whereIn('id',$arrId)->update(['sent_status'=>1]); 

    }
}
