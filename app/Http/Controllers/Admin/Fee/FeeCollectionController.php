<?php

namespace App\Http\Controllers\Admin\Fee;

use App\Http\Controllers\Controller;
use App\Model\StudentFeeDetail;
use App\Model\StudentSiblingInfo;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeeCollectionController extends Controller
{
    public function index(){
    	$students = array_pluck(Student::get(['id','registration_no']), 'registration_no','id');
    	return view('admin.finance.feecollection.fee_collection_form',compact('students'));
    }

    public function show(Request $request,Student $student){

    	$student = Student::find($request->student_id); 
    	$data = view('admin.finance.feecollection.fee_collection_detail',compact('student'))->render();
    	return response()->json($data);
    }

    public function feeDetail(Request $request,Student $student){
        
        $siblings = StudentSiblingInfo::where('student_id',$request->student_id)->get();

    	$StudentFeeDetails = StudentFeeDetail::where('student_id',$request->student_id)->whereMonth('from_date' , $request->month)->whereYear('from_date' , $request->year)->get(); 
    	 
    	$data = view('admin.finance.feecollection.fee_detail_show',compact('StudentFeeDetails','siblings'))->render();
    	return response()->json($data);
    }
}
