<?php

namespace App\Console\Commands;

use App\Admin;
use App\Events\SmsEvent;
use App\Helpers\MailHelper;
use App\Jobs\SendSmsJob;
use App\Model\Sms\EmailTemplate;
use App\Model\Sms\SentEmailAttachment;
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
        $admin=Admin::where('role_id',1)->first();

       $id=SentSmsDetail::where('sent_status',0)->pluck('id')->toArray(); 
       $sentSmsDetails=SentSmsDetail::whereIn('id',$id)->update(['sent_status'=>2]); 
       $sentSmsDetailsFinalDatas=SentSmsDetail::where('sent_status',2)->get(); 
       foreach ($sentSmsDetailsFinalDatas as $sentSmsDetailsFinalDatas) {
        event(new smsEvent($sentSmsDetailsFinalDatas->mobileno,$sentSmsDetailsFinalDatas->smstext));  

       }
       $arrId =$sentSmsDetailsFinalDatas->pluck('id')->toArray();
       $sentSmsDetails=SentSmsDetail::whereIn('id',$arrId)->update(['sent_status'=>1]);

      //send email 
      $id=SentEmailDetail::where('sent_status',0)->pluck('id')->toArray(); 
      $sentEmailDetails=SentEmailDetail::whereIn('id',$id)->update(['sent_status'=>2]); 
      $sentEmailDetailsFinalDatas=SentEmailDetail::where('sent_status',2)->get(); 
      foreach ($sentEmailDetailsFinalDatas as $sentEmailDetailsFinalData) { 
            $message =$sentEmailDetailsFinalData->email_text;         
            $emailto = $admin->email;         
            $subject = $sentEmailDetailsFinalData->email_subject;
            $template_purpose =$sentEmailDetailsFinalData->purpose;
            $temp_name='';
            if ($template_purpose==1) {
              $temp_name='message';
            }else{
               $temp_name='message';
            }
            $up_u=array(); 
            $up_u['data']=$message;
            $urls=SentEmailAttachment::where('sent_email_detail_id',$sentEmailDetailsFinalData->id)->pluck('attachment_file')->toArray();
            
             // Log::info(Storage_path() . '/app/student/feereceipt/100.pdf');
            
            
             

         
        $mailHelper =new MailHelper(); 
        $mailHelper->mailsendwithattachment('emails.'.$temp_name,$up_u,'No-Reply',$subject,'ashokkumar2342@gmail.com','ashokkumar2342@gmail.com',5,$urls);
 
         } 
         // $array=array();       
         // $array['mobile']=$sentEmailDetailsFinalData->mobileno;
         // $array['message']=$sentEmailDetailsFinalData->smstext;
         // $job=(new SendSmsJob($array))->delay(now()->addSeconds(5));
         // dispatch($job);  

       
      $arrId =$sentEmailDetailsFinalDatas->pluck('id')->toArray();
      $sentSmsDetails=SentEmailDetail::whereIn('id',$arrId)->update(['sent_status'=>1]); 

    }
}
