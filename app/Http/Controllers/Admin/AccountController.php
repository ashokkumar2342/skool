<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Model\Role;
use App\Model\Minu;
use App\Model\UserClass;
use App\Model\ClassType;
use App\Model\UserClassType;
use Auth;
class AccountController extends Controller
{
    Public function index(){
    	
    	$accounts = Admin::all();
    	return view('admin.account.list',compact('accounts'));
    }

    Public function form(Request $request){
           
    	$roles = Role::all();
    	return view('admin.account.form',compact('roles'));
    } 

    Public function store(Request $request){
    	   	 
    	$accounts = new Admin();
    	$accounts->first_name = $request->first_name;
    	$accounts->last_name = $request->last_name;
    	$accounts->role_id = $request->role_id;
    	$accounts->email = $request->email;
    	$accounts->password = bcrypt($request['password']);
    	$accounts->mobile = $request->mobile;
    	$accounts->dob = $request->dob;
    	if ($accounts->save())
    	 {
    	  return redirect()->route('admin.account.list')->with(['message'=>'Account created Successfully.','class'=>'success']);    	
    	}
    	else{
    		return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    		}
    }

    Public function edit(Request $request, Admin $account){
        $roles = Role::all();
        
        
      
        return view('admin.account.edit',compact('account','roles')); 
    }

    Public function update(Request $request, Admin $account){

                 
        
        
        $account->first_name = $request->first_name;
        $account->last_name = $request->last_name;
        $account->role_id = $request->role_id;
        $account->email = $request->email;
        $account->password = bcrypt($request['password']);
        $account->mobile = $request->mobile;
        $account->dob = $request->dob;
        if ($account->save())
         {
          return redirect()->route('admin.account.list')->with(['message'=>'Account Updated Successfully.','class'=>'success']);        
        }
        else{
            return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
            }
    }

    Public function destroy(Admin $account){
        if ($account->delete()) {
           return redirect()->back()->with(['message'=>'accoount deleted','class'=>'success']);
        }
    }

    Public function status(Admin $account){

        $data = ($account->status == 1)?['status' => 0]:['status' => 1 ]; 
        $account->status = $data['status'];
        if( $account->save()){
            return redirect()->back()->with(['class'=>'success','message'=>'status change  successfully ...']);   
        }
        else{
            return response()->json(['status'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
    }
     Public function rstatus(Admin $account){
        
        $data = ($account->r_status == 1)?['r_status' => 0]:['r_status' => 1 ]; 
        $account->r_status = $data['r_status'];
        if( $account->save()){
            return redirect()->back()->with(['class'=>'success','message'=>'status change  successfully ...']);   
        }
        else{
            return response()->json(['status'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
    }

    Public function wstatus(Admin $account){
        
        $data = ($account->w_status == 1)?['r_status' => 0]:['r_status' => 1 ]; 
        $account->w_status = $data['r_status'];
        if( $account->save()){
            return redirect()->back()->with(['class'=>'success','message'=>'status change  successfully ...']);   
        }
        else{
            return response()->json(['status'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
    }

    Public function dstatus(Admin $account){
        
        $data = ($account->d_status == 1)?['r_status' => 0]:['r_status' => 1 ]; 
        $account->d_status = $data['r_status'];
        if( $account->save()){
            return redirect()->back()->with(['class'=>'success','message'=>'status change  successfully ...']);   
        }
        else{
            return response()->json(['status'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
    }

    Public function minu(Request $request, Admin $account){
        $roles = Role::all();
        $minus = Admin::find($account->id)->minus;  
        return view('admin.account.minu',compact('account','roles','minus')); 
    }


    Public function userClass(){
        $classes = ClassType::all();
        $userClass = UserClassType::all();
        $users = array_pluck(Admin::get(['id','first_name'])->toArray(),'first_name', 'id');     

        return view('admin.account.userClass',compact('users','classes','userClass'));
       
    }

    Public function userClassStore(Request $request){
        $this->validate($request,[
            'class_id' => 'required|max:199',             
            'user' => 'required|max:199',             
            ]);
        $data = $request->except('_token');        
        $class_count = count($data['class_id']);
        for ($i=0; $i < $class_count; $i++) { 
            $classUser =  new UserClassType();
            $classUser->class_id = $data['class_id'] [$i];
            $classUser->admin_id = $data['user'];

            $classUser->save();             
        }

            return redirect()->back()->with(['class'=>'success','message'=>'User Class Successfully']);   

        
        
    }




}
