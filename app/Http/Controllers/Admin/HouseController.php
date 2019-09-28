<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HouseController extends Controller
{
   public function index($value='')
   {
   	return view('admin.house.index');
   }
   public function addForm($value='')
   {
   	return view('admin.house.add_form');
   }
   public function store(Request $request) 
    {
        $admin=Auth::guard('admin')->user()->id;
       
    	$rules=[
    	  
            'name' => 'required|min:2|max:50', 
            'code' => 'required|min:2|max:5|unique:houses', 
            
             
             
       
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
    	$house=new House();
    	 
    	$house->code=$request->code; 
    	$house->name=$request->name; 
        $house->last_updated_by=$admin; 
    	$house->save();
    	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
    public function tableShow($value='')
    {
    	$houses= House::orderBy('id','DESC')->get();
    	return view('admin.house.table',compact('houses')); 
    }
    public function edit($id)
    {
    	$houses= House::find($id);
    	return view('admin.house.edit',compact('houses')); 
    }
    public function destroy($id)
    {
    	$houses= House::find($id);
    	$houses->delete();
    	return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    	  
    }
    public function update(Request $request,$id)
    {
       $admin=Auth::guard('admin')->user()->id;
    	$rules=[
    	  
            'name' => 'required', 
            'code' => 'required|min:2|max:50', 
             
             
       
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
    	$house= House::find($id);
    	 
    	$house->code=$request->code; 
    	$house->name=$request->name; 
        $house->last_updated_by=$admin; 
    	$house->save();
    	$response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }

    

}
