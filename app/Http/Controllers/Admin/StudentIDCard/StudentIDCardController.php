<?php

namespace App\Http\Controllers\Admin\StudentIDCard;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Event\EveneFor;
use App\Model\StudentIDCard\StudentIDCard;
use App\Student;
use Illuminate\Http\Request;

class StudentIDCardController extends Controller
{
    public function index()
    {
    	$studentIDCards=StudentIDCard::all();
    	$eventFors=EveneFor::all();
    	 return view('admin.student.idCard.view',compact('eventFors','studentIDCards'));
    }

    public function generateClassWise(Request $request)
    {
    	 if ($request->id==2) {
    	 	 $classTypes=ClassType::all();
    	 return view('admin.student.idCard.class_select_box',compact('classTypes'));
    	 } 
    }

    public function store(Request $request)
    {
    	  
    	 if ($request->event_for==1) {
    	  	$student=Student::all(); 
    	  	return $student;
    	  } 
    	return $student=Student::where('class_id',$request->class_id)->get();
    }
}
