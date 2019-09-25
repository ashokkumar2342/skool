<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\LessonPlan;
use App\Model\LessonPlanFollow;
use App\Model\Library\TeacherFaculty;
use App\Model\SubjectType;
use Illuminate\Http\Request;

class TeacherDiaryController extends Controller
{
   public function index($value='')
   {
   	 return view('admin.teacher.teacherDairy.diary.index',compact('classTypes','subjectTypes','TeacherFacultys','lessonPlans','lessonPlanFollows'));
   }
   public function addForm($value='')
   {
   	    $lessonPlanFollows =LessonPlanFollow::all();
        $classTypes=MyFuncs::getClassByHasUser();
        $subjectTypes=SubjectType::orderBy('id','ASC')->get();
        $TeacherFacultys=TeacherFaculty::orderBy('name','ASC')->get();
        $lessonPlans=LessonPlan::orderBy('id','DESC')->get();
        return view('admin.teacher.teacherDairy.diary.add_form',compact('classTypes','subjectTypes','TeacherFacultys','lessonPlans','lessonPlanFollows'));
   	  
   }
   public function diaryDetails(Request $request)
   {
      
        $classTypes=MyFuncs::getClassByHasUser();
        $subjectTypes=SubjectType::orderBy('id','ASC')->get(); 
        $lessonPlans=LessonPlan::orderBy('id','DESC')->get();
     $lessonPlanFollows =LessonPlanFollow::where('teacher_id',$request->teacher_id)->where('ondate',$request->ondate)->first();
      $response = array();
      $response['status'] = 1; 
      $response['data'] =view('admin.teacher.teacherDairy.diary.diary' ,compact('lessonPlanFollows','lessonPlanFollows','classTypes','subjectTypes','lessonPlans'))->render(); 
      return response()->json($response); 
   }
   public function diaryDetailsStore(Request $request)
   {
      return $request;
       
   }
}
