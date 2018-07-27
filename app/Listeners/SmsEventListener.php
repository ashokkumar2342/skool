<?php

namespace App\Listeners;

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

    // $msg=urlencode($event->message);
    
    // $url = "http://bulksms.innovusine.com/sendurlcomma.aspx?user=20086841&pwd=Ask@123&senderid=ADMJJR&mobileno=$event->mobile&msgtext=$msg";
    // $ch = curl_init($url);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // $curl_scraped_page = curl_exec($ch);
    // curl_close($ch);
    
     Log::info($event->mobile.' : '.$event->message);
      
  }
}
