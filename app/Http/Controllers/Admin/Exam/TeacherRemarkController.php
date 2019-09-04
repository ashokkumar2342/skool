<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Exam\TeacherRemark;
use App\Model\SubjectType;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeacherRemarkController extends Controller
{
    public function index()
    {
    	$academicYears=AcademicYear::orderBy('id','ASC')->get();
    	$students=Student::where('student_status_id',1)->orderBy('name','ASC')->get();
    	$subjects=SubjectType::orderBy('id','ASC')->get();
    	return view('admin.exam.remark.view',compact('academicYears','students','subjects')); 
    }
    public function store(Request $request)
    {
      $user=Auth::guard('admin')->user()->id;
    	$rules=[
    	  
            'academic_year' => 'required', 
            'ondate' => 'required', 
            'student_name' => 'required', 
            'subject' => 'required', 
              
       
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
    	$teacherRemark=new TeacherRemark();
    	$teacherRemark->academic_year_id=$request->academic_year;
    	$teacherRemark->ondate=$request->ondate;
    	$teacherRemark->teacher_id=$user;
    	$teacherRemark->student_id=$request->student_name;
    	$teacherRemark->subject_id=$request->subject;
    	$teacherRemark->remark=$request->remark;
    	$teacherRemark->save();
    	$response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }
    public function tableShow()
    {
    	$teacherRemarks=TeacherRemark::orderBy('id','ASC')->get();
    	return view('admin.exam.remark.list',compact('teacherRemarks')); 
    }
}
