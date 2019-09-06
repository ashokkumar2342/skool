<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Exam\ClassTest;
use App\Model\Exam\ClassTestDetail;
use App\Model\Month;
use App\Model\SubjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExamReportController extends Controller
{
    public function index($value='')
    {
    	$academicYears=AcademicYear::orderBy('id','ASC')->get();
    	$subjects=SubjectType::orderBy('id','ASC')->get();
    	$months=Month::orderBy('id','ASC')->get();
    	return view('admin.exam.report.index',compact('academicYears','subjects','months'));
    }
    public function filter(Request $request)
    {  
        $rules=array();
        $report_wise=$request->report_wise;
        if ($request->has('from_month')&&($request->has('to_month')&&($request->has('registration_no')&&($request->has('subject_id'))))) {  
            $from = date('2019-'.$request->from_month.'-01');
            $to = date('2019-'.$request->to_month.'-02');
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->where('student_id',$request->registration_no)->where('subject_id',$request->subject_id)->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->has('from_month')&&($request->has('to_month')&&($request->has('registration_no')))) {  
            $from = date('2019-'.$request->from_month.'-01');
            $to = date('2019-'.$request->to_month.'-02');
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->where('student_id',$request->registration_no)->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->has('from_month')&&($request->has('to_month')&&($request->has('class_id')&&($request->has('section_id')&&($request->has('subject_id')))))) {  
            $from = date('2019-'.$request->from_month.'-01');
            $to = date('2019-'.$request->to_month.'-02');
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('subject_id',$request->subject_id)->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->has('from_month')&&($request->has('to_month')&&($request->has('class_id')&&($request->has('section_id'))))) {  
            $from = date('2019-'.$request->from_month.'-01');
            $to = date('2019-'.$request->to_month.'-02');
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->where('class_id',$request->class_id)->where('section_id',$request->section_id)->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->has('from_month')&&($request->has('to_month')&&($request->has('class_id')&&($request->has('subject_id'))))) {  
            $from = date('2019-'.$request->from_month.'-01');
            $to = date('2019-'.$request->to_month.'-02');
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->where('class_id',$request->class_id)->where('subject_id',$request->subject_id)->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->has('from_month')&&($request->has('to_month')&&($request->has('class_id')))) {  
            $from = date('2019-'.$request->from_month.'-01');
            $to = date('2019-'.$request->to_month.'-02');
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->where('class_id',$request->class_id)->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->has('from_month')&&($request->has('to_month'))) { 
            $from = date('2019-'.$request->from_month.'-01');
            $to = date('2019-'.$request->to_month.'-02');
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->report_wise==$report_wise && $request->has('registration_no')&& $request->has('subject_id')) {  
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->where('student_id',$request->registration_no)->where('subject_id',$request->subject_id)->get(); 
        }elseif ($request->report_wise==$report_wise && $request->has('registration_no')) { 
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->where('student_id',$request->registration_no)->get(); 
        }elseif ($request->report_wise==$report_wise && $request->has('class_id')&& $request->has('section_id')&& $request->has('subject_id')) { 
           
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('subject_id',$request->subject_id)->get(); 
        }elseif ($request->report_wise==$report_wise && $request->has('class_id') && $request->has('section_id')) { 
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->where('class_id',$request->class_id)->where('section_id',$request->section_id)->get(); 
        }elseif ($request->report_wise==$report_wise && $request->has('class_id')&& $request->has('subject_id')) { 
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->where('class_id',$request->class_id)->where('subject_id',$request->subject_id)->get(); 
        }elseif ($request->report_wise==3) {
             
           $rules['class_id']='required'; 
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->where('class_id',$request->class_id)->get(); 
        }elseif ($request->has('subject_id')) { 
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->where('subject_id',$request->subject_id)->get(); 
        }
        $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }

    	 $response = array();
         $response['status'] = 1; 
         $response['data'] =view('admin.exam.report.filter_table',compact('classTestDetails'))->render();
         return response()->json($response);
    	  
    }
}
