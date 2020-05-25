<?php

namespace App\Http\Controllers\Admin\Room;

use App\Http\Controllers\Controller;
use App\Model\Room\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use PDF;

class RoomController extends Controller
{
    public function index(){
    	$roomTypes=RoomType::orderBy('id','ASC')->get();
    	return view('admin.room.view',compact('roomTypes'));
    }

    public function store(Request $request){
      $admin=Auth::guard('admin')->user()->id;
    	$rules=[
    	  
            'room_name' => 'required|max:50|unique:room_types,name',
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
         $roomType->last_updated_by=$admin;
         $roomType->save();
         $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
    public function edit($id=null){
        if ($id!=null) {
         $roomTypes=RoomType::findOrFail(Crypt::decrypt($id)); 
        }
        if ($id==null) {
         $roomTypes=''; 
        }
       return view('admin.room.edit',compact('roomTypes'));
    }
     public function destroy($id)
    {
    	 $roomType=RoomType::findOrFail(Crypt::decrypt($id));
    	 $roomType->delete();
    	 return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
     public function update(Request $request,$id=null){
      $admin=Auth::guard('admin')->user()->id; 
    	$rules=[
    	  
             'room_name' => 'required|max:50|unique:room_types,name,'.$id,
            'location' => 'required|max:100', 
             
       
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
         $roomType= RoomType::firstOrNew(['id'=>$id]); 
         $roomType->name=$request->room_name;
         $roomType->location=$request->location;
         $roomType->last_updated_by=$admin;
         $roomType->save();
         $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
        } 
    }
    public function report($value='')
    {
        $roomTypes=RoomType::orderBy('id','ASC')->get();
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.room.room_pdf',compact('roomTypes'));
        return $pdf->stream('room.pdf');
    }
}
