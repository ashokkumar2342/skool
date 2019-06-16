<?php
namespace App\Http\Controllers;
use App\Events\SmsEvent;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\Gender;
use App\Model\ParentRegistration;
use App\Model\Religion;
use App\Model\SessionDate;
use App\Model\StudentDefaultValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    //  */
    public function __construct()
    {
       // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mail::send(new SendMail('email@ashok.com','otp'));
        // Mail::send('mail',['name','ashok'],function($message){
        //     $message->to('ashok@gmail.com','To Ashok')->subject('test email');
        //     $message->from('ashok@gmail.com','Ashoka');
        // } );
        // $data = array( 'email' => 'sample@sample.com', 'otp' => 'Lar', 'from' => 'sample@sample.comt', 'from_name' => 'Vel' );
        // Mail::send( 'mail', $data, function( $message ) use ($data)
        // {
        //     $message->to( $data['email'] )->from( $data['from'], $data['otp'] )->subject( 'Welcome!' );
        // });
        // return 'done';
        return view('front.registration.dashboard');
        // $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');    
        // $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        // $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        // $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        // $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        // $default = StudentDefaultValue::find(1); 
           
        // return view('front.registration.form',compact('classes','sessions','default','genders','religions','categories'));
    }

    public function inbox(Request $request){  
          Log::info($request);
        // $inbox =new Inbox();
        // $inbox->phone =$request->PhNO;
        // $inbox->key_no =$request->Key;
        // $inbox->phrase =$request->Phrase;
        // $inbox->param =$request->Param;
        // $inbox->full_msg =$request->FullMsg;
    }
}