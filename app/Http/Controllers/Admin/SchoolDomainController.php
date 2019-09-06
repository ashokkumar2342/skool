<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Model\SchoolDomain;

class SchoolDomainController extends Controller
{
    public function index($value='')
    {
    	return view('schoolDetails.dominos.index');
    }
    public function addForm($value='')
    {
    	return view('schoolDetails.dominos.add_form'); 
    }
    public function store(Request $request)
    {

    	$rules=[
    	  
            'school_code' => 'required', 
            'school_name' => 'required', 
            'school_url' => 'required', 
            'from_date' => 'required', 
            'to_date' => 'required', 
            'user_id' => 'required', 
            'password' => 'required', 
            'person_name' => 'required', 
            'mobile' => 'required', 
            'email' => 'required', 
             
       
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
    	$schoolDominos= new SchoolDomain(); 
    	$schoolDominos->school_code=$request->school_code; 
    	$schoolDominos->school_name=$request->school_name; 
    	$schoolDominos->school_url=$request->school_url;  
        $schoolDominos->from_date=$request->from_date;  
        $schoolDominos->to_date=$request->to_date;  
        $schoolDominos->user_id=$request->user_id;  
        $schoolDominos->password=$request->password;  
        $schoolDominos->person_name=$request->person_name;  
        $schoolDominos->mobile=$request->mobile;  
        $schoolDominos->email=$request->email;  
        $schoolDominos->address=$request->address;  
    	$schoolDominos->save();
    	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        

        }  
    }
    public function tableShow()
    {
    	$schoolDominos=SchoolDomain::orderBy('id','ASC')->get();
    	return view('schoolDetails.dominos.table_show',compact('schoolDominos')); 
    }
    public function edit($id)
    {
    	 $schoolDominos=SchoolDomain::find($id);
    	return view('schoolDetails.dominos.edit',compact('schoolDominos')); 
    }
    public function destroy($id)
    {
    	 $schoolDominos=SchoolDomain::find($id);
    	 $schoolDominos->delete();
    	 return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    	  
    }
    public function update(Request $request,$id)
    {
$rules=[
          
            'school_code' => 'required', 
            'school_name' => 'required', 
            'school_url' => 'required', 
            'from_date' => 'required', 
            'to_date' => 'required', 
            'user_id' => 'required', 
            'password' => 'required', 
            'person_name' => 'required', 
            'mobile' => 'required', 
            'email' => 'required', 
             
       
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
        $schoolDominos=SchoolDomain::find($id); 
        $schoolDominos->school_code=$request->school_code; 
        $schoolDominos->school_name=$request->school_name; 
        $schoolDominos->school_url=$request->school_url;  
        $schoolDominos->from_date=$request->from_date;  
        $schoolDominos->to_date=$request->to_date;  
        $schoolDominos->user_id=$request->user_id;  
        $schoolDominos->password=$request->password;  
        $schoolDominos->person_name=$request->person_name;  
        $schoolDominos->mobile=$request->mobile;  
        $schoolDominos->email=$request->email;  
        $schoolDominos->address=$request->address;  
        $schoolDominos->save();
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        

        }  
    }
}
