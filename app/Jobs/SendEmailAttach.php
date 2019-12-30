<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendEmailAttach implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $template=$this->data['template'];
        $data_mail=$this->data['data_mail'];
        $sender_name=$this->data['sender_name'];
        $subject=$this->data['subject'];
        $to=$this->data['to'];
        $from=$this->data['from'];
        $attach=$this->data['attach'];

       Mail::send($template, $data_mail, function ($message) use($sender_name,$subject,$to,$from,$attach) {
            //$path=storage_path('TempStore/'.$attach);
            $message->from($from, $sender_name);
            $message->subject($subject);
            $message->to($to);
            foreach ($attach as $key => $value) {
               $message->attach($value);
            }
            
            
        });
    }
}
