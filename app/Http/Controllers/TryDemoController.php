<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Model\Role;
use Illuminate\Http\Request;

class TryDemoController extends Controller
{
    public function index()
    { 
        $roles = Role::orderBy('name','ASC')->get();
        return view('front.trydemo.try_demo_form',compact('roles'));
      
    }
    public function store(Request $request)
    {  
        $this->validate($request,[
            'role' => 'required',             
            'first_name' => 'required',             
            'email' => 'required|email|max:50|unique:admins',             
            'mobile' => 'required|numeric|digits:10|unique:admins',  
            'captcha' => 'required|captcha' 
            ]);
        $char = substr( str_shuffle( "0123456789" ), 0, 6 );
        $accounts = new Admin(); 
        $accounts->first_name = $request->first_name;
        $accounts->email = $request->email; 
        $accounts->password =bcrypt($char);
        $accounts->mobile = $request->mobile; 
        $accounts->role_id =$request->role;
        $accounts->password_plain =$char;  
        $accounts->status =1;
        if ($accounts->save())
         {    
         
          return redirect()->route('admin.login')->with(['message'=>'Account created Successfully.','class'=>'success']);        
        }
        else{
            return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
            }
    }

  
}
