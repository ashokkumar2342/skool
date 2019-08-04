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
        //  // PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        // $pdf = PDF::loadView('admin.student.idCard.temp1', compact('students'));
        // $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        // $pdf->setPaper('a4', 'landscape')->setWarnings(false);
        // $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        //return $pdf->stream('IdCard'.date('d-m-Y H:i:s').'.pdf');
        $customPaper = array(0,0,1120.00,550.80);
        $pdf = PDF::loadView('admin.student.idCard.temp1',compact('students'))->setPaper($customPaper, 'landscape'); ;
      
           return $pdf->stream('student_all_report.pdf');
        // $html = View::make('admin.student.idCard.temp1',compact('students'),[]);
        //    $pdfUPN = PDF::loadHTML($html)->stream();
        //    $randomTime = time();
        //    if (!is_dir("upn/")) {
        //      mkdir("upn/");
        //    }
        //    $CaseID = '123';
        //    file_put_contents('./upn/'.$CaseID.'-'.$randomTime.'.pdf',$pdfUPN);
        //    $pdf = './upn/'.$CaseID.'-'.$randomTime.'.pdf';
        //    return $pdfUPN;
     
    	 
    }
}
