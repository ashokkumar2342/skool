<?php

namespace App\Listeners;

use App\Admin;
use App\Admin\Model\SmsApi;
use App\Events\SmsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SmsEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SmsEvent  $event
     * @return void
     */
  public function handle(SmsEvent $event)
  {  
        $smsApi=SmsApi::where('status',1)->first(); 
        $admin=Admin::where('role_id',1)->first(); 

        if ($smsApi->enableAutoSend==1) {
         $msg=urlencode($event->message);
         
         $url = "http://bulksms.innovusine.com/sendurlcomma.aspx?user=$smsApi->user_id&pwd=$smsApi->password&senderid=$smsApi->sender_id&mobileno=$admin->mobile&msgtext=$msg";
         $ch = curl_init($url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $curl_scraped_page = curl_exec($ch);
         curl_close($ch); 
          Log::info($event->mobile.' : '.$event->message);
        }
        
        
    
      
  }
}
