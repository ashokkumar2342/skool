<?php

namespace App\Http\Controllers\Admin\Room;

use App\Http\Controllers\Controller;
use App\Model\Room\CombineClassSubjectGroup;
use App\Model\Subject;
use App\Model\SubjectType;
use App\Model\Section;
use App\Model\Room\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CombineClassSubjectGroupController extends Controller
{
    public function index(){
    	$subjectTypes=SubjectType::all();
    	return view('admin.room.combineClassSubjectGroup.view',compact('subjectTypes'));
    }
    public function subjectWiseClasss(Request $request){
             // return $request;
      $classTypes=Subject::where('subjectType_id',$request->id)->orderBy('classType_id', 'ASC')->get(); 
      return view('admin.room.combineClassSubjectGroup.select_class',compact('classTypes'));
     }

      public function classtWiseSection(Request $request){
             
      $sections=Section::where('class_id',$request->id)->get();
      $combineClassSubjectSaveId=CombineClassSubjectGroup::where('subject_id',$request->subject_id)->where('class_id',$request->id)->pluck('section_id')->toArray();
     

       $roomTypes=RoomType::all();
      return view('admin.room.combineClassSubjectGroup.add_group',compact('sections','roomTypes','combineClassSubjectSaveId','combineClassSubjectTables'));
    }

    public function tableShow(Request $request){
      
         $combineClassSubjectTables=CombineClassSubjectGroup::where('subject_id',$request->subject_id)->where('class_id',$request->class_id)->get();
       return view('admin.room.combineClassSubjectGroup.table_show',compact('combineClassSubjectTables'));
    }

     public function store(Request $request){
    	    // return $request;
    	$rules=[
    	  
             'subject' => 'required', 
             'group_no' => 'required', 
             'room_no' => "required", 
             'section' => "required", 
             'class' => "required", 
            
       
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
            
        	$combineClassSubjectGroup=CombineClassSubjectGroup::where(['subject_id'=>$request->subject,'class_id'=>$request->class,'group_no'=>$request->group_no])->first();
            if (!empty($combineClassSubjectGroup)) {
                $response=['status'=>0,'msg'=>'Group Already Create'];
                return response()->json($response); 

           }
            $sectionId=count($request->section);
             if ($sectionId>1) { 
            foreach ($request->section as $key => $section_id) { 
             
            $combineClassSubjectGroup= new CombineClassSubjectGroup();
             $combineClassSubjectGroup->subject_id=$request->subject;
             $combineClassSubjectGroup->class_id=$request->class;
             $combineClassSubjectGroup->section_id=$section_id;
             $combineClassSubjectGroup->group_no=$request->group_no;
             $combineClassSubjectGroup->room_id=$request->room_no; 
             $combineClassSubjectGroup->save();
              }
            }else{ 
               $response=['status'=>0,'msg'=>'Maximum Two Section Select'];
                 return response()->json($response);
               }  
             }  
               $response=['status'=>1,'msg'=>'Created Successfully'];
                return response()->json($response);
       }

    public function combineClassSubjectDetailsDestroy($id){
        $combineClassSubjectGroup=CombineClassSubjectGroup::find($id);
        $combineClassSubjectGroupDelete=CombineClassSubjectGroup::where('subject_id',$combineClassSubjectGroup->subject_id)->where('class_id',$combineClassSubjectGroup->class_id)->where('group_no',$combineClassSubjectGroup->group_no)->get();
            foreach ($combineClassSubjectGroupDelete as $key => $value) {
             
              $value->delete();
            }
         return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']); 


    }

}
