<?php

namespace App\Http\Controllers\Admin\TimeTable;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Section;
use App\Model\Subject;
use App\Model\SubjectType;
use App\Model\TimeTable\ClassSubjectPeriod;
use App\Model\TimeTable\OptionSubjectGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassSubjectPeriodController extends Controller
{
    public function index(){
    	$classTypes=ClassType::all();
    	$classSubjectPeriods=ClassSubjectPeriod::all();
    	return view('admin.timeTable.classSubjectPeriod.view',compact('classTypes','classSubjectPeriods'));
    }
    public function classWiseSection(Request $request){
        // return $request;
        // if ($request->id==1) {
        //     # code...
        // }
    	$sections=Section::where('class_id',$request->id)->get();
        $subjects=Subject::where('classType_id',$request->id)->get();
    	return view('admin.timeTable.classSubjectPeriod.select_section',compact('sections','subjects'));

    }
    public function store(Request $request){
    	 // return $request;
    	$rules=[
    	  
            'class' => 'required', 
            'section' => 'required', 
            'subject' => "required", 
            'no_of_period' => "required", 
            'period_duration' => "required", 
       
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
        	$classSubjectPeriod=ClassSubjectPeriod::firstOrNew(['class_id'=>$request->class]);
        	$classSubjectPeriod->class_id=$request->class;
        	$classSubjectPeriod->section_id=$request->section;
        	$classSubjectPeriod->subject_id=$request->subject;
        	$classSubjectPeriod->no_of_period=$request->no_of_period;
        	$classSubjectPeriod->period_duration=$request->period_duration;
            $classSubjectPeriod->save();
        	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 

    }




    //------------Option-subject-group-------------------------------------------------------------------------------

    public function optionSubjectGroup(){
        $classTypes=ClassType::all();
       
        // $subjectTypes=SubjectType::all();
    	return view('admin.timeTable.optionSubjectGroup.view',compact('classTypes'));
    } 

    public function subjectShow(Request $request){
           // return $request;
         $optionSubjectGroups=OptionSubjectGroup::where('class_id',$request->class_id)->where('group_no',$request->group_id)->get();
         $optionSubjectGroup=OptionSubjectGroup::where('class_id',$request->class_id)->where('group_no',$request->group_id)->first();
        $classSubjects=Subject::where('classType_id',$request->id)->get();
        // $subjectTypes=SubjectType::all();
        
        return view('admin.timeTable.optionSubjectGroup.subject_show',compact('classSubjects','optionSubjectGroup','optionSubjectGroups'));
        
    }

    public function subjectMoveStore(Request $request){
         // return $request;
        $rules=[
          
             'class_id' => 'required', 
             'group_id' => 'required', 
            // 'subject_id' => 'required', 
            // 'email' => "required|max:50|email|unique:authors,email", 
       
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
              $subjectCount =count($request->subject_id);
            if ( $subjectCount!=0) {
                foreach ($request->subject_id as $key => $subject_id) {
                
                   $subject =Subject::where('classType_id',$request->class_id)->where('subjectType_id',$subject_id)->first();
                   if ($subject->isoptional_id!=2) {
                       $response=['status'=>0,'msg'=>'Please Select Optional Subject Only'];
                            return response()->json($response); 
                   }
                }
            }
            
             
              if ($subjectCount==2) { 
                 $optionSubjectGroup=OptionSubjectGroup::firstOrNew(['class_id'=>$request->class_id,'group_no'=>$request->group_id]);

                  $optionSubjectGroup->class_id=$request->class_id;
                  $optionSubjectGroup->group_no=$request->group_id;
                  $optionSubjectGroup->subject_id=implode( ',',$request->subject_id);
                  $optionSubjectGroup->save();
                     $response=['status'=>1,'msg'=>'Created Successfully'];
                     return response()->json($response); 
              }else{
                $response=['status'=>0,'msg'=>'Group Create two Subject Accept'];
                     return response()->json($response); 
              }
                
           
        } 
         
        
    }

    public function destroySubjectSave($id){
      $optionSubjectGroup=OptionSubjectGroup::find($id);   
      $optionSubjectGroup->delete();
       return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);   
    }
}
