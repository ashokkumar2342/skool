<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\StudentFineDetail;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
    public function edit($id)
    {   $studentFineDetail=StudentFineDetail::find($id);
    	return view('admin.student.finedetails.edit',compact('studentFineDetail')); 
    }
    public function update(Request $request,$id)
    {   
    	$studentFineDetail= StudentFineDetail::find($id);
    	 
    	$studentFineDetail->fine_name=$request->fine_name;
    	$studentFineDetail->fine_amount=$request->fine_amount;
    	$studentFineDetail->save();
    	$response=array();
    	$response['status']=1;
    	$response['msg']='Update Successfully';
    	return $response;
    	 
    }
    public function delete($id)
    {   $studentFineDetail=StudentFineDetail::find($id);
        $studentFineDetail->delete();
    	$response=array();
    	$response['status']=1;
    	$response['msg']='Delete Successfully';
    	return $response;
    	 
    }
    //-------absent-fine-details---------------------------------

    public function absentIndex($value='')
    {
    	 $classTypes=MyFuncs::getClassByHasUser();
    	 $academicYear= new MyFuncs();
         $yearmonths=$academicYear->getMonthYear();
    	 return view('admin.student.finedetails.absent_index',compact('classTypes','yearmonths')); 
    }
    public function absentShow(Request $request)
    {
        $for_month = date('m',strtotime($request->for_month_year));
        $for_year = date('Y',strtotime($request->for_month_year));
    	$rules=array();
        $rules['class_id']='required';
        $rules['section_id']='required';
        $rules['for_month_year']='required'; 
       
        $rules['amount_per_day']='required'; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
        }
    	 $absentFineDetails=DB::select(DB::raw("call up_calculate_stu_absent_fine_detail ('$request->class_id','$request->section_id','$for_month','$for_year','$request->amount_per_day')"));
    	 $response=array();
    	 $response['status']=1;
    	 $response['data']=view('admin.student.finedetails.absent_result',compact('absentFineDetails','for_month','for_year'))->render();
    	 return $response;
    }
    public function absentStore(Request $request)
    {

    	 
    	 $text='';
    	 foreach ($request->amount as $student_id => $amount) {
    	 	$text.=$student_id.','.$amount.',';
    	 } 
    	 $absentFineDetails=DB::select(DB::raw("call up_save_stu_absent_fine_detail ('$request->for_month','$request->for_year','$text')")); 
    	 $response=array();
    	 $response['status']=1;
    	 $response['msg']=$absentFineDetails[0]->message;
    	 return $response; 
    }
}
