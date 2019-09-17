<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Appointment;
use App\Model\SubjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function index()
    {
    	$appointments=Appointment::orderBy('id','DESC')->get();
    	 return view('admin.teacher.teacherDairy.index',compact('appointments'));
    }
    public function addForm($value='')
    {
    	$admins=Auth::guard('admin')->user();
    	$subjectTypes=SubjectType::orderBy('id','ASC')->get();
    	return view('admin.teacher.teacherDairy.add_form',compact('subjectTypes','admins')); 
    }
    public function store(Request $request)
    {
      $admins=Auth::guard('admin')->user()->id;
    	$rules=[
    	  
            // 'user_id' => 'required', 
            'from_date' => 'required', 
            'to_date' => 'required', 
            'subject_id' => 'required', 
             
             
       
    	];

    	$validator = Validator::make($request->all(),$rules);
    	if ($validator->fails()) {
    	    $errors = $validator->errors()->all();
    	    $response=array();
    	    $response["status"]=0;
    	    $response["msg"]=$errors[0];
    	    return response()->json($response);// response as json
    	}
        else {
    	$appointment=new Appointment();
    	$appointment->user_id=$admins;
    	$appointment->from_date=$request->from_date;
    	$appointment->to_date=$request->to_date;
    	$appointment->subject_id=$request->subject_id;
    	$appointment->venue=$request->venue;
    	$appointment->save();
    	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
    public function tableShow($value='')
    {
    	$appointments=Appointment::orderBy('id','DESC')->get();
    	 return view('admin.teacher.teacherDairy.table_show',compact('appointments'));
    }
    public function edit($id)
    {
    	$admins=Auth::guard('admin')->user();
    	$subjectTypes=SubjectType::orderBy('id','ASC')->get();
    	$appointments=Appointment::find($id);
    	return view('admin.teacher.teacherDairy.edit',compact('subjectTypes','admins','appointments')); 
    }
    public function update(Request $request ,$id)
    {
      $admins=Auth::guard('admin')->user()->id;
    	$rules=[
    	  
            // 'user_id' => 'required', 
            'from_date' => 'required', 
            'to_date' => 'required', 
            'subject_id' => 'required', 
             
             
       
    	];

    	$validator = Validator::make($request->all(),$rules);
    	if ($validator->fails()) {
    	    $errors = $validator->errors()->all();
    	    $response=array();
    	    $response["status"]=0;
    	    $response["msg"]=$errors[0];
    	    return response()->json($response);// response as json
    	}
        else {
    	$appointment=Appointment::find($id);
    	$appointment->user_id=$admins;
    	$appointment->from_date=$request->from_date;
    	$appointment->to_date=$request->to_date;
    	$appointment->subject_id=$request->subject_id;
    	$appointment->venue=$request->venue;
    	$appointment->save();
    	$response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }
}
