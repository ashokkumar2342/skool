<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
        $data = array( 'email' => 'sample@sample.com', 'otp' => 'Lar', 'from' => 'sample@sample.comt', 'from_name' => 'Vel' );

        Mail::send( 'mail', $data, function( $message ) use ($data)
        {
            $message->to( $data['email'] )->from( $data['from'], $data['otp'] )->subject( 'Welcome!' );
        });
        return 'done';
        // return view('home');
    }
}
