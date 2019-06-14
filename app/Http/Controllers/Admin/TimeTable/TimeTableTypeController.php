<?php

namespace App\Http\Controllers\Admin\TimeTable;

use App\Http\Controllers\Controller;
use App\Model\TimeTable\TimeTableType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class TimeTableTypeController extends Controller
{
    public function index()
    {
    	 $timeTableTypes=TimeTableType::all();
    	 return view('admin.timeTable.timeTableType.list',compact('timeTableTypes'));
    }

    public function store(Request $request)
    {
    	$rules=[
    	  
            'name' => 'required', 
            'discription' => 'required', 
              
       
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
    	  $timeTableType=new TimeTableType();
    	  $timeTableType->name=$request->name;
    	  $timeTableType->discription=$request->discription;
    	  $timeTableType->save();
    	  $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
    public function edit($id){

     $timeTableType=TimeTableType::findOrFail(Crypt::decrypt($id));
    	 return view('admin.timeTable.timeTableType.edit',compact('timeTableType'));	
    }

     public function update(Request $request,$id)
    {
    	$rules=[
    	  
            'name' => 'required', 
            'discription' => 'required', 
              
       
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
    	  $timeTableType= TimeTableType::find($id);
    	  $timeTableType->name=$request->name;
    	  $timeTableType->discription=$request->discription;
    	  $timeTableType->save();
    	  $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }
    public function destroy($id){
    	 $timeTableType=TimeTableType::findOrFail(Crypt::decrypt($id));
    	 $timeTableType->delete();
    	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }

}
