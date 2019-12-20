<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\StudentFineDetail;
use App\Student;
use Illuminate\Http\Request;

class StudentFineDetailController extends Controller
{
    public function index($value='')
    {
    	$st=new Student();
    	$students=$st->getStudentAllDetails();
    	return view('admin.student.finedetails.index',compact('students'));
    }
    public function show(Request $request)
    {    $student_id=$request->student_id;
    	 $studentFineDetails=StudentFineDetail::where('student_id',$request->student_id)->get();
    	 $response=array();
    	 $response['status']=1;
    	 $response['data']=view('admin.student.finedetails.show_table',compact('studentFineDetails','student_id'))->render();
    	 return $response;
    }
    public function addForm($student_id)
    {   
    	return view('admin.student.finedetails.add_form',compact('student_id')); 
    }
    public function store(Request $request,$student_id)
    {   
    	$studentFineDetail=new StudentFineDetail();
    	$studentFineDetail->student_id=$student_id;
    	$studentFineDetail->fine_name=$request->fine_name;
    	$studentFineDetail->fine_amount=$request->fine_amount;
    	$studentFineDetail->save();
    	$response=array();
    	$response['status']=1;
    	$response['msg']='Add Successfully';
    	return $response;
    	 
    }
}
