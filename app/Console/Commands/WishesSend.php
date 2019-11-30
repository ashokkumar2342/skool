<?php

namespace App\Console\Commands;

use App\Events\SmsEvent;
use App\Helpers\MailHelper;
use App\Model\Sms\EmailTemplate;
use App\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class WishesSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wishes:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All Type Wishes Send SMS';

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
        
             $students= Student::whereMonth('dob','=',\Carbon\Carbon::today()->month)->whereDay('dob','=',\Carbon\Carbon::today()->day)->get();

             foreach($students as $student){ 
                 event(new SmsEvent($student->mobile_sms,'Dear student, ZAD Global School wish you very happy birthday.'));
                 Log::info('Dear student, ZAD Global School wish you very happy birthday.'.$student->mobile_sms); 
             }

              $this->sendEmail($students);
         
         // if(\Carbon\Carbon::now()->format('H:i') == '13:00'){
         //      $students= StudentAttendance::where('attendance_type_id',2)->whereDate('created_at',date('Y-m-d'))->get();
         //      foreach($students as $student){
                 
         //          Log::info('Dear Parents, Your Child is Today Absent.'.$student->mobile_sms);
                 
         //      }
         //  }
    }

    public function sendEmail($students)
    {      $temp = new EmailTemplate();
           $template= $temp->getTemplateByTempalateId(2);    
        
             foreach($students as $student){ 
                  $message = $student->message;         
                  $emailto = $student->emailid;         
                  $subject = $template->subject; 
                  $up_u=array();                   
                  $up_u['name']=$student->name;
                   
                  $up_u['subject']=$subject; 
                  $mailHelper =new MailHelper();
                  
                  $mailHelper->mailsend('emails.birthday',$up_u,'No-Reply',$subject,$emailto,'noreply@domain.com',5);
                
             }
    }
}
