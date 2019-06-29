<?php

namespace App\Http\Controllers\Admin\Room;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\SubjectType;
use App\Model\Room\ClassWiseRoom;
use App\Model\Room\SubjectWiseRoom;
use App\Model\Room\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class ClassRoomController extends Controller
{
     public function index(){
     	$classWiseRooms=ClassWiseRoom::all();
        $classWiseRoomSaveId=ClassWiseRoom::pluck('room_id')->toArray();
    	$roomTypes=RoomType::all();
    	$classTypes=ClassType::all();
    	return view('admin.room.classWiseRoom.class_wise_room_view',compact('roomTypes','classTypes','classWiseRooms','classWiseRoomSaveId'));
    }

    public function store(Request $request){
    	// return $request;
    	$rules=[
    	  
            
            'room_name' => 'required', 
             
       
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
         $classWiseRoom=new ClassWiseRoom();
         $classWiseRoom->class_id=$request->class_id;
         $classWiseRoom->room_id=$request->room_name;
         $classWiseRoom->save();
         $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
    public function edit($id){
    	 
    	$roomTypes=RoomType::all();
    	$classTypes=ClassType::all();
        $classWiseRoomSaveId=ClassWiseRoom::pluck('room_id')->toArray();
      $classWiseRooms=ClassWiseRoom::findOrFail(Crypt::decrypt($id));
    return view('admin.room.classWiseRoom.class_wise_room_edit',compact('classWiseRooms','roomTypes','classTypes','classWiseRoomSaveId'));
    }
     public function destroy($id)
    {
    	 $classWiseRoom=ClassWiseRoom::findOrFail(Crypt::decrypt($id));
    	 $classWiseRoom->delete();
    	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
     public function update(Request $request,$id){
    	$rules=[
    	  
            'room_name' => 'required', 
             
       
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
         $classWiseRooms= ClassWiseRoom::find($id);
         $classWiseRooms->class_id=$request->class_id;
         $classWiseRooms->room_id=$request->room_name;
         $classWiseRooms->save();
         $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }



    //---------------Sublect-Wisw-Room----------------------------------------------------------------------------------

    public function subjectWiseRoom(){
        $subjectTypes=SubjectType::all();
        $roomTypes=RoomType::all();
        $subjectWiseRooms=SubjectWiseRoom::all();
         return view('admin.room.subjectWiseRoom.view',compact('subjectTypes','roomTypes','subjectWiseRooms'));
    }

     public function subjectWiseRoomStore(Request $request){
        $rules=[
          
            'subject' => 'required', 
            'room' => 'required', 
             
       
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
         $subjectWiseRoom=new SubjectWiseRoom();
         $subjectWiseRoom->subject_id=$request->subject;
         $subjectWiseRoom->room_id=$request->room;
         $subjectWiseRoom->save();
         $response=['status'=>1,'msg'=>'Create Successfully'];
            return response()->json($response);
        } 
         
    }
}
