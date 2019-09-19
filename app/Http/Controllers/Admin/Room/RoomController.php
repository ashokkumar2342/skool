<?php

namespace App\Http\Controllers\Admin\Room;

use App\Http\Controllers\Controller;
use App\Model\Room\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    public function index(){
    	$roomTypes=RoomType::all();
    	return view('admin.room.view',compact('roomTypes'));
    }

    public function store(Request $request){
    	$rules=[
    	  
            'room_name' => 'required', 
            'location' => 'required', 
             
       
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
         $roomType=new RoomType();
         $roomType->name=$request->room_name;
         $roomType->location=$request->location;
         $roomType->save();
         $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
    public function edit($id){
      $roomTypes=RoomType::findOrFail(Crypt::decrypt($id));
    return view('admin.room.edit',compact('roomTypes'));
    }
     public function destroy($id)
    {
    	 $roomType=RoomType::findOrFail(Crypt::decrypt($id));
    	 $roomType->delete();
    	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
     public function update(Request $request,$id){
    	$rules=[
    	  
            'room_name' => 'required', 
            'location' => 'required', 
             
       
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
         $roomType= RoomType::find($id);
         $roomType->name=$request->room_name;
         $roomType->location=$request->location;
         $roomType->save();
         $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }
}
