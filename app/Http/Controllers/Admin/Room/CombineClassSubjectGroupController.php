<?php

namespace App\Http\Controllers\Admin\Room;

use App\Http\Controllers\Controller;
use App\Model\Room\CombineClassSubjectGroup;
use App\Model\Subject;
use App\Model\SubjectType;
use App\Model\Room\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CombineClassSubjectGroupController extends Controller
{
    public function index(){
    	$subjectTypes=SubjectType::all();
    	return view('admin.room.combineClassSubjectGroup.view',compact('subjectTypes'));
    }
    public function subjectWiseGroup(Request $request){
           // return $request;
      $classTypes=Subject::where('subjectType_id',$request->subject_id)->get();
      $combineClassSubjectGroup=CombineClassSubjectGroup::where('subject_id',$request->subject_id)->where('group_no',$request->group_id)->first();
      
      $roomTypes=RoomType::all();
      return view('admin.room.combineClassSubjectGroup.add_group',compact('classTypes','combineClassSubjectGroup','roomTypes','combineClassSubjectGroupSaveRoom'));
    }

     public function store(Request $request){
    	   // return $request;
    	$rules=[
    	  
             'subject' => 'required', 
             'group_no' => 'required', 
             'room_no' => "required", 
             'class_id' => "required", 
       
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
        	$combineClassSubjectGroup=CombineClassSubjectGroup::firstOrNew(['subject_id'=>$request->subject,'group_no'=>$request->group_no]);
             $combineClassSubjectGroup->subject_id=$request->subject;
             $combineClassSubjectGroup->group_no=$request->group_no;
             $combineClassSubjectGroup->room_id=$request->room_no;
             $combineClassSubjectGroup->class_id=implode( ',',$request->class_id);
             $combineClassSubjectGroup->save();
                $response=['status'=>1,'msg'=>'Created Successfully'];
                return response()->json($response);
        } 

    }

}
