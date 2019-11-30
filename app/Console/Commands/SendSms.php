<?php

namespace App\Console\Commands;

use App\Jobs\SendSmsJob;
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
       
    }
}
