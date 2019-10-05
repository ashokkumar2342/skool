<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\Exam\ClassTest;
use App\Model\Exam\ClassTestDetail;
use App\Model\Exam\ExamSchedule;
use App\Model\Exam\MarkDetail;
use App\Model\Month;
use App\Model\SubjectType;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
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
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->where('student_id',$request->registration_no)->where('subject_id',$request->subject_id)->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->has('from_month')&&($request->has('to_month')&&($request->has('registration_no')))) {  
            $from = date('2019-'.$request->from_month.'-01');
            $to = date('2019-'.$request->to_month.'-02');
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->where('student_id',$request->registration_no)->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->has('from_month')&&($request->has('to_month')&&($request->has('class_id')&&($request->has('section_id')&&($request->has('subject_id')))))) {  
            $from = date('2019-'.$request->from_month.'-01');
            $to = date('2019-'.$request->to_month.'-02');
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('subject_id',$request->subject_id)->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->has('from_month')&&($request->has('to_month')&&($request->has('class_id')&&($request->has('section_id'))))) {  
            $from = date('2019-'.$request->from_month.'-01');
            $to = date('2019-'.$request->to_month.'-02');
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->where('class_id',$request->class_id)->where('section_id',$request->section_id)->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->has('from_month')&&($request->has('to_month')&&($request->has('class_id')&&($request->has('subject_id'))))) {  
            $from = date('2019-'.$request->from_month.'-01');
            $to = date('2019-'.$request->to_month.'-02');
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->where('class_id',$request->class_id)->where('subject_id',$request->subject_id)->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->has('from_month')&&($request->has('to_month')&&($request->has('class_id')))) {  
            $from = date('2019-'.$request->from_month.'-01');
            $to = date('2019-'.$request->to_month.'-02');
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->where('class_id',$request->class_id)->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->has('from_month')&&($request->has('to_month'))) { 
            $from = date('2019-'.$request->from_month.'-01');
            $to = date('2019-'.$request->to_month.'-02');
          $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->whereBetween('test_date', [$from, $to])->get(); 
        }elseif ($request->report_wise==$report_wise && $request->has('registration_no')&& $request->has('subject_id')) {  
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->where('student_id',$request->registration_no)->where('subject_id',$request->subject_id)->get(); 
        }elseif ($request->report_wise==$report_wise && $request->has('registration_no')) { 
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->where('student_id',$request->registration_no)->get(); 
        }elseif ($request->report_wise==$report_wise && $request->has('class_id')&& $request->has('section_id')&& $request->has('subject_id')) { 
           
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('subject_id',$request->subject_id)->get(); 
        }elseif ($request->report_wise==$report_wise && $request->has('class_id') && $request->has('section_id')) { 
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->where('class_id',$request->class_id)->where('section_id',$request->section_id)->get(); 
        }elseif ($request->report_wise==$report_wise && $request->has('class_id')&& $request->has('subject_id')) { 
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->where('class_id',$request->class_id)->where('subject_id',$request->subject_id)->get(); 
        }elseif ($request->report_wise==3) {
             
           $rules['class_id']='required'; 
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->where('class_id',$request->class_id)->get(); 
        }elseif ($request->has('subject_id')) { 
            $classTestDetails=ClassTestDetail::join('class_tests','class_tests.id','=','class_test_details.class_test_id')->join('grades','grades.id','=','class_test_details.grade')->where('subject_id',$request->subject_id)->get(); 
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
    public function print(Request $request)
    {
       
       $students=Student::whereIn('id',$request->student_id)->whereIn('class_id',$request->class_id)->whereIn('section_id',$request->section_id)->get();
       $classTestDetail=ClassTestDetail::
        join('class_tests','class_tests.id','=','class_test_details.class_test_id')
      ->join('grades','grades.id','=','class_test_details.grade')
      ->join('students','students.id','=','class_test_details.student_id')
      ->whereIn('student_id',$request->student_id) 
      ->whereIn('subject_id',$request->subject_id) 
       
      ->get();
      // $classTestDetails=$classTestDetail->groupBy('student_id');
      $classTestDetails=$classTestDetail->groupBy('class_id');
      $customPaper = array(0,0,406.00,602.80); 
        $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.exam.report.report_pdf_generate',compact('classTestDetails','students','classTestDetail'))->setPaper($customPaper, 'landscape');;
      
      return $pdf->stream('student_all_report.pdf');
    }
    public function examReport($value='')
    {
      $academicYears=AcademicYear::orderBy('id','ASC')->get();
      $subjects=SubjectType::orderBy('id','ASC')->get();
      $months=Month::orderBy('id','ASC')->get();
      return view('admin.exam.report.examReport.index',compact('academicYears','subjects','months'));
    }
    public function examReportFilter(Request $request)
    { 
       
      $markDetails=MarkDetail::join('exam_schedules','exam_schedules.id','=','mark_details.exam_schedule_id')->join('exam_terms','exam_terms.id','=','exam_schedules.exam_term_id')->get();

        $response = array();
        $response['status'] = 1;
        $response['data'] =view('admin.exam.report.examReport.student_marks_details_table',compact('markDetails'))->render();
        return response()->json($response); 
      
    }
    public function examReportPrint(Request $request)
    {
      
             $students=Student::whereIn('id',$request->student_id)->get();
             $markDetail=MarkDetail::
             join('exam_schedules','exam_schedules.id','=','mark_details.exam_schedule_id')->
             join('exam_terms','exam_terms.id','=','exam_schedules.exam_term_id')->
             join('students','students.id','=','mark_details.student_id')->
             get();
             $markDetails=$markDetail->groupBy('student_id');
      $pdf = PDF::loadView('admin.exam.report.examReport.print_report',compact('students','markDetails')); 
       return $pdf->stream('exam_report.pdf');
    }
}
