<?php

namespace App\Http\Controllers\Admin\StudentIdCard;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Event\EveneFor;
use App\Model\IdCard\IdCardTemplate;
use App\Model\ReportFor;
use App\Student;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class StudentIdCardController extends Controller
{
    public function index()
    {
    	$studentIDCards=IdCardTemplate::all();
    	$reportFors=ReportFor::all();
    	 return view('admin.student.idCard.view',compact('reportFors','studentIDCards'));
    }

    public function generateClassWise(Request $request)
    {
    	 $reportforId=$request->id;
    	 	 $classTypes=ClassType::all();
             $students=Student::where('student_status_id',1)->get();
    	 return view('admin.student.idCard.class_select_box',compact('classTypes','reportforId','students'));
    	  
    }

    public function store(Request $request)
    { 
        
         
        if ($request->report_for==1) {
        $students=Student::where('student_status_id',1)->get(); 
        }if ($request->report_for==2) {
        $students=Student::where('id',$request->registration_no)->where('student_status_id',1)->get(); 
        }if ($request->report_for==3) {
        $students=Student::whereIn('class_id',$request->class_id)->where('student_status_id',1)->get(); 
        }if ($request->report_for==4) {
        $students=Student::where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('student_status_id',1)->get(); 
        } 
      if ($request->student_idcard==1) {
         
         if ($request->template_name==1) {
         $customPaper = array(0,0,307.00,202.80);
        $pdf = PDF::loadView('admin.student.idCard.temp1',compact('students'))->setPaper($customPaper, 'landscape'); 
        return $pdf->stream('student_all_report.pdf');
           
         } if ($request->template_name==2) {
         $customPaper = array(0,0,306.00,202.80);
        $pdf = PDF::loadView('admin.student.idCard.temp2',compact('students'))->setPaper($customPaper, 'landscape'); 
        return $pdf->stream('student_all_report.pdf');
           
         } if ($request->template_name==3) {
         $customPaper = array(0,0,208.00,307.80);
        $pdf = PDF::loadView('admin.student.idCard.temp3',compact('students'))->setPaper($customPaper, 'landscape'); 
        return $pdf->stream('student_all_report.pdf');
           
         } 
      }
      if ($request->perent_idcard==2) {
         
        $customPaper = array(0,0,208.00,307.80);
        $pdf = PDF::loadView('admin.student.idCard.perent_idcard',compact('students'))->setPaper($customPaper, 'landscape'); 
        return $pdf->stream('student_all_report.pdf');
      }
     
    	 
    }
}
