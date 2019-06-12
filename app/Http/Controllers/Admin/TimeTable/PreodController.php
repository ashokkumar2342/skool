<?php

namespace App\Http\Controllers\Admin\TimeTable;

use App\Http\Controllers\Controller;
use App\Model\TimeTable\PeriodTiming;
use App\Model\TimeTable\TimeTableType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class PreodController extends Controller
{
     public function index()
    {
    	 $timeTableTypes=TimeTableType::all();
    	 $periodTimings=PeriodTiming::all();
    	 return view('admin.timeTable.periodTiming.list',compact('periodTimings','timeTableTypes'));
    }


     public function store(Request $request)
    {
    	// return $request;
    	$rules=[
    	  
            'time_table_type' => 'required', 
            'time' => 'required', 
              
       
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
    	  $timeTableType=new PeriodTiming();
    	  $timeTableType->time_table_type_id=$request->time_table_type;
    	  $timeTableType->from_time=$request->time;
    	  $timeTableType->save();
    	  $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
    public  function tableShow(Request $request){
         $periodTimings=PeriodTiming::where('time_table_type_id',$request->id)->get();
          return view('admin.timeTable.periodTiming.history_table',compact('periodTimings'));
    }

    public function edit($id){
      $timeTableTypes=TimeTableType::all();
     $periodTimings=PeriodTiming::findOrFail(Crypt::decrypt($id));
    	 return view('admin.timeTable.periodTiming.edit',compact('periodTimings','timeTableTypes'));	
    }

     public function update(Request $request,$id)
    {
    	$rules=[
    	  
            'time_table_type' => 'required', 
            'time' => 'required', 
              
       
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
    	  $timeTableType= PeriodTiming::find($id);
    	  $timeTableType->time_table_type_id=$request->time_table_type;
    	  $timeTableType->from_time=$request->time;
    	  $timeTableType->save();
    	  $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }
    public function destroy($id){
    	 $periodTiming=PeriodTiming::findOrFail(Crypt::decrypt($id));
    	 $periodTiming->delete();
    	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }

}
