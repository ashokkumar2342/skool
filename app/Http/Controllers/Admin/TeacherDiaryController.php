<?php

namespace App\Http\Controllers\Admin;

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
        $classTypes=ClassType::orderBy('id','ASC')->get();
        $subjectTypes=SubjectType::orderBy('id','ASC')->get();
        $TeacherFacultys=TeacherFaculty::orderBy('name','ASC')->get();
        $lessonPlans=LessonPlan::orderBy('id','DESC')->get();
        return view('admin.teacher.teacherDairy.diary.add_form',compact('classTypes','subjectTypes','TeacherFacultys','lessonPlans','lessonPlanFollows'));
   	  
   }
}
