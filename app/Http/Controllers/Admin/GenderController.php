<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenderController extends Controller
{
   public function index()
    {
      $genders=Gender::orderBy('genders','ASC')->get(); 
     return view('admin.gender.gender',compact('genders'));    
    }
    public function addForm($id='')
    {
       if ($id!='') {
       	 $genders=Gender::find($id);
       }
       if ($id=='') {
       	 $genders='';
       }
     return view('admin.gender.add_form',compact('genders'));    
    }
    public function store(Request $request,$id=null)
    { 
    	 $rules=[
    	  
            'gender_name' => 'required|max:20|unique:genders,genders'.$id, 
            'code' => 'required|max:2|unique:genders,code'.$id, 
             
       
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
    	$Gender=Gender::firstOrNew(['id'=>$id]);
    	$Gender->genders=$request->gender_name;
    	$Gender->code=$request->code; 
    	$Gender->save();
    	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        }
    }
    public function destroy($id)
    {
    	$genders=Gender::find($id);
    	$genders->delete();
    	return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
}
