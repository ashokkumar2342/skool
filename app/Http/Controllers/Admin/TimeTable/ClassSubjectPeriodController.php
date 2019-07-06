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
    	$classSubjectPeriods=ClassSubjectPeriod::orderBy('id', 'DESC')->get();
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
    public function destroy($id){
        $classSubjectPeriods=ClassSubjectPeriod::find($id);
        $classSubjectPeriods->delete();
        return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
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
            
                
        	
        	

            foreach ($request->section as $sec_id) { 

               foreach ($request->subject  as $sub_id) {
                $classSubjectPeriod=ClassSubjectPeriod::firstOrNew(['class_id'=>$request->class,'section_id'=>$sec_id,'subject_id'=>$sub_id]);
                  $classSubjectPeriod->class_id=$request->class;
                 $classSubjectPeriod->section_id=$sec_id;
        	     $classSubjectPeriod->subject_id=$sub_id;
                $classSubjectPeriod->no_of_period=$request->no_of_period;
                $classSubjectPeriod->period_duration=$request->period_duration;
                $classSubjectPeriod->save();
               
              }
            }
        	
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
         
         $optionSubjectArrayId=OptionSubjectGroup::where('class_id',$request->class_id)->pluck('subject_id')->toArray();
        $classSubjects=Subject::where('classType_id',$request->id)->where('isoptional_id',2)->get();
        // $subjectTypes=SubjectType::all();
        
        return view('admin.timeTable.optionSubjectGroup.subject_show',compact('classSubjects','optionSubjectGroup','optionSubjectGroups','optionSubjectArrayId'));
        
    }

     public function tableShow(Request $request){
           // return $request;
         $optionSubjectGroups=OptionSubjectGroup::where('class_id',$request->class_id)->get();
         $optionSubjectGroup=OptionSubjectGroup::where('class_id',$request->class_id)->first(); 
        return view('admin.timeTable.optionSubjectGroup.table_show',compact('optionSubjectGroup','optionSubjectGroups'));
        
    }

    public function subjectMoveStore(Request $request){
         // return $request;
        $rules=[
          
             'class_id' => 'required', 
             'group_no' => 'required', 
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
            if ( $subjectCount>1) {
                foreach ($request->subject_id as $key => $subject_id) {
                
                   $subject =Subject::where('classType_id',$request->class_id)->where('subjectType_id',$subject_id)->first();
                   if ($subject->isoptional_id!=2) {
                       $response=['status'=>0,'msg'=>'Please Select Optional Subject Only'];
                            return response()->json($response); 
                   }
                }
            }
            
             
              if ($subjectCount>1) { 
                 $groupId=OptionSubjectGroup::where(['class_id'=>$request->class_id,'group_no'=>$request->group_no])->first();
                 if (!empty($groupId)) {
                    $response=['status'=>0,'msg'=>'Already Group Created'];
                     return response()->json($response);  
                 }
                 foreach ($request->subject_id as $key => $subject_id) {
                    $optionSubjectGroup=new OptionSubjectGroup();

                     $optionSubjectGroup->class_id=$request->class_id;
                     $optionSubjectGroup->group_no=$request->group_no;
                     $optionSubjectGroup->subject_id=$subject_id;
                     $optionSubjectGroup->save();
                 }

              
                     $response=['status'=>1,'msg'=>'Created Successfully'];
                     return response()->json($response); 
              }else{
                $response=['status'=>0,'msg'=>'Maximum Two Subject Select'];
                     return response()->json($response); 
              }
                
           
        } 
         
        
    }

    public function destroySubjectSave($id){
      $optionSubjectGroup=OptionSubjectGroup::find($id);   
      $optionSubjectGroupDelete=OptionSubjectGroup::where('class_id',$optionSubjectGroup->class_id)->where('group_no',$optionSubjectGroup->group_no)->get();
     foreach ($optionSubjectGroupDelete as $key => $value) {
            
             $value->delete();
        } 
        $response=['status'=>1,'msg'=>'Delete Successfully'];
                     return response()->json($response);   
       
    }
}
