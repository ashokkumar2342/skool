<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\LessonPlan;
use App\Model\LessonPlanFollow;
use App\Model\Library\TeacherFaculty;
use App\Model\SubjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LessonPlanController extends Controller
{
    public function index()
    {
    	 
    	 return view('admin.teacher.teacherDairy.lessonPlan.index',compact('appointments'));
    }
    public function addForm($value='')
    {
    	$classTypes=ClassType::orderBy('id','ASC')->get();
    	$subjectTypes=SubjectType::orderBy('id','ASC')->get();
    	return view('admin.teacher.teacherDairy.lessonPlan.add_form',compact('subjectTypes','classTypes')); 
    }
    public function store(Request $request)
    {
       
    	$rules=[
    	  
            // 'user_id' => 'required', 
            
             
             
       
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
    	$lessonPlan=new LessonPlan();
    	 
    	$lessonPlan->class_id=$request->class_id; 
    	$lessonPlan->subject_id=$request->subject_id;
    	$lessonPlan->lecture_no=$request->lecture_no;
    	$lessonPlan->topic_covered=$request->topic_covered;
    	$lessonPlan->save();
    	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
     public function tableShow($value='')
    {
    	$lessonPlans=LessonPlan::orderBy('id','DESC')->get();
    	 return view('admin.teacher.teacherDairy.lessonPlan.table_show',compact('lessonPlans'));
    }
    public function edit($id)
    {
    	$classTypes=ClassType::orderBy('id','ASC')->get();
    	$subjectTypes=SubjectType::orderBy('id','ASC')->get();
    	$lessonPlans=LessonPlan::find($id);
    	return view('admin.teacher.teacherDairy.lessonPlan.edit',compact('subjectTypes','classTypes','lessonPlans'));
    }
    public function update(Request $request,$id)
    {
       
    	$rules=[
    	  
            // 'user_id' => 'required', 
            
             
             
       
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
    	$lessonPlan=LessonPlan::find($id);
    	 
    	$lessonPlan->class_id=$request->class_id; 
    	$lessonPlan->subject_id=$request->subject_id;
    	$lessonPlan->lecture_no=$request->lecture_no;
    	$lessonPlan->topic_covered=$request->topic_covered;
    	$lessonPlan->save();
    	$response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }

//---------------lesson-plan-follow--------------------------------------------
    public function lessonPlanFollow($value='')
    {
        return view('admin.teacher.teacherDairy.lessonFollow.index',compact('lessonPlans'));
    }
    public function lessonPlanFollowAddForm($value='')
    {
        $classTypes=ClassType::orderBy('id','ASC')->get();
        $subjectTypes=SubjectType::orderBy('id','ASC')->get();
        $TeacherFacultys=TeacherFaculty::orderBy('name','ASC')->get();
        $lessonPlans=LessonPlan::orderBy('id','DESC')->get();
        return view('admin.teacher.teacherDairy.lessonFollow.add_form',compact('classTypes','subjectTypes','TeacherFacultys','lessonPlans'));
    }
    public function lessonPlanFollowStore(Request $request)
    {
       
        $rules=[
          
            // 'user_id' => 'required', 
            
             
             
       
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
        $lessonPlanFollow=new LessonPlanFollow();
         
        $lessonPlanFollow->class_id=$request->class_id; 
        $lessonPlanFollow->subject_id=$request->subject_id;
        $lessonPlanFollow->section_id=$request->section_id;
        $lessonPlanFollow->teacher_id=$request->teacher_id;
        $lessonPlanFollow->lesson_plan_id=$request->lesson_plan_id;
        $lessonPlanFollow->ondate=$request->ondate;
        $lessonPlanFollow->save();
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
    public function lessonPlanFollowTable($value='')
    {
       $lessonPlanFollows =LessonPlanFollow::orderBy('id','DESC')->get();
       return view('admin.teacher.teacherDairy.lessonFollow.table',compact('lessonPlanFollows'));
    }
    public function lessonPlanFollowEdit($id)
    {
       $lessonPlanFollows =LessonPlanFollow::find($id);
        $classTypes=ClassType::orderBy('id','ASC')->get();
        $subjectTypes=SubjectType::orderBy('id','ASC')->get();
        $TeacherFacultys=TeacherFaculty::orderBy('name','ASC')->get();
        $lessonPlans=LessonPlan::orderBy('id','DESC')->get();
        return view('admin.teacher.teacherDairy.lessonFollow.edit',compact('classTypes','subjectTypes','TeacherFacultys','lessonPlans','lessonPlanFollows'));
       
    }
    public function lessonPlanFollowUpdate(Request $request,$id)
    {
       
        $rules=[
          
            // 'user_id' => 'required', 
            
             
             
       
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
        $lessonPlanFollow= LessonPlanFollow::find($id);
         
        $lessonPlanFollow->class_id=$request->class_id; 
        $lessonPlanFollow->subject_id=$request->subject_id;
        $lessonPlanFollow->section_id=$request->section_id;
        $lessonPlanFollow->teacher_id=$request->teacher_id;
        $lessonPlanFollow->lesson_plan_id=$request->lesson_plan_id;
        $lessonPlanFollow->ondate=$request->ondate;
        $lessonPlanFollow->save();
        $response=['status'=>1,'msg'=>'Update Successfully'];
            return response()->json($response);
        } 
    }
}
