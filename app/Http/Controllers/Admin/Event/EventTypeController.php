<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Model\Event\EventType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class EventTypeController extends Controller
{
    public function index()
    {
    	 return view('admin.event.event_type_list');
    }
    public function addEventType()
    {
    	 return view('admin.event.event_type_add_form');
    }
        public function store(Request $request)
    {
    	$rules=[
    	  
            'name' => 'required', 
             
       
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
    	  $eventType= new EventType();
    	  $eventType->name=$request->name;
    	  $eventType->save();
    	  $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
    public function tableShow()
    {
    	 $eventTypes= EventType::all();
    	 return view('admin.event.event_type_table',compact('eventTypes'));

    }
    public function edit($id)
    {
        $eventTypes= EventType::findOrFail(Crypt::decrypt($id));
        return view('admin.event.event_type_edit',compact('eventTypes')); 
    }
    public function destroy($id)
    {
        $eventTypes= EventType::findOrFail(Crypt::decrypt($id));
        $eventTypes->delete();
    return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
          
    }
    public function update(Request $request,$id)
    {
        $rules=[
          
            'name' => 'required', 
             
       
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
          $eventType=EventType::find($id);
          $eventType->name=$request->name;
          $eventType->save();
          $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
}
