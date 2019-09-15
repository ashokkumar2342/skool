<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Event\EveneFor;
use App\Model\Event\EventDetails;
use App\Model\Event\EventType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class EventDetailsController extends Controller
{
    public function index()
    {
    	 return view('admin.event.eventDetails.form');
    }
    public function addForm()
    {
    	  $eventTypes= EventType::all();
    	  $eventFors=EveneFor::all();
    	  return view('admin.event.eventDetails.event_details_add',compact('eventTypes','eventFors'));
    }

    public function onChange(Request $request)
    {
    	
    	 if ($request->id==2) {
    	 	 $classTypes=ClassType::all();
    	 return view('admin.event.eventDetails.class_select_box',compact('classTypes'));
    	 }  
    }
    public function store(Request $request)
    {
    	// return $request;
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
    	  $eventDetails=new EventDetails();
    	  $eventDetails->event_name=$request->name;
    	  $eventDetails->event_type_id=$request->event_type_id;
    	  $eventDetails->description=$request->discription;
    	  $eventDetails->start_date=$request->start_date;
    	  $eventDetails->end_date=$request->end_date;
    	  $eventDetails->incharge_name=$request->incharge_name;
    	  $eventDetails->event_for_id=$request->event_for_id;
          if ($request->class_id) { 
          $eventDetails->class_id=implode(',',$request->class_id); 
           } 
    	  $eventDetails->color=$request->color;
    	  $eventDetails->save();
    	  $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }

    public function tableShow()
    {
        $eventDetails=EventDetails::all();
         return view('admin.event.eventDetails.event_details_table',compact('eventDetails'));
    }
    public function edit($id)
    {
        $eventTypes= EventType::all();
        $eventFors=EveneFor::all();
        $eventDetail=EventDetails::findOrFail(Crypt::decrypt($id));
         return view('admin.event.eventDetails.event_details_edit',compact('eventDetail','eventTypes','eventFors'));
    }

        public function update(Request $request,$id)
        {
            // return $request;
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
              $eventDetails= EventDetails::find($id);
              $eventDetails->event_name=$request->name;
              $eventDetails->event_type_id=$request->event_type_id;
              $eventDetails->description=$request->discription;
              $eventDetails->start_date=$request->start_date;
              $eventDetails->end_date=$request->end_date;
              $eventDetails->incharge_name=$request->incharge_name;
              $eventDetails->event_for_id=$request->event_for_id;
              if ($request->class_id) { 
              $eventDetails->class_id=implode(',',$request->class_id); 
               } 
              $eventDetails->color=$request->color;
              $eventDetails->save();
              $response=['status'=>1,'msg'=>'Created Successfully'];
                return response()->json($response);
            } 
        }

    public function todayEventDashboard($id)
     {
         if ($id==1) {
           $events=EventDetails::where('start_date',date('Y-m-d'))->get(); 
         }elseif ($id=2) {
          $EventComing=date('Y-m-d',strtotime(date('Y-m-d') ."+1 days")); 
          $EventComings=date('Y-m-d',strtotime($EventComing ."+7 days")); 
          $events=EventDetails::whereBetween('start_date', [$EventComing,$EventComings])->get(); 
         }
         return view('admin.event.eventDashboard.today',compact('events'));

     } 
}      
