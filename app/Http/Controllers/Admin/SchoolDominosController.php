<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Model\SchoolDominos;

class SchoolDominosController extends Controller
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
    	$schoolDominos= new SchoolDominos(); 
    	$schoolDominos->school_code=$request->school_code; 
    	$schoolDominos->school_name=$request->school_name; 
    	$schoolDominos->school_url=$request->school_url;  
    	$schoolDominos->save();
    	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        

        }  
    }
    public function tableShow()
    {
    	$schoolDominos=SchoolDominos::orderBy('id','ASC')->get();
    	return view('schoolDetails.dominos.table_show',compact('schoolDominos')); 
    }
    public function edit($id)
    {
    	 $schoolDominos=SchoolDominos::find($id);
    	return view('schoolDetails.dominos.edit',compact('schoolDominos')); 
    }
    public function destroy($id)
    {
    	 $schoolDominos=SchoolDominos::find($id);
    	 $schoolDominos->delete();
    	 return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    	  
    }
    public function update(Request $request,$id)
    {

    	$rules=[
    	  
            'school_code' => 'required', 
            'school_name' => 'required', 
            'school_url' => 'required', 
             
       
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
    	$schoolDominos= SchoolDominos::find($id); 
    	$schoolDominos->school_code=$request->school_code; 
    	$schoolDominos->school_name=$request->school_name; 
    	$schoolDominos->school_url=$request->school_url;  
    	$schoolDominos->save();
    	$response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        

        }  
    }
}
