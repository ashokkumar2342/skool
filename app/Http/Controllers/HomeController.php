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
        Mail::send(new SendMail());
        // Mail::send(['text'=>'email'],['name','ashok'],function($message){
        //     $message->to('ashok@gmail.com','To Ashok')->subject('test email');
        //     $message->from('ashok@gmail.com','Ashoka');
        // } );
        return 'done';
        // return view('home');
    }
}
