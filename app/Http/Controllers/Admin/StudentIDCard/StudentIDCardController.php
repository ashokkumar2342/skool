<?php

namespace App\Http\Controllers\Admin\StudentIdCard;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Event\EveneFor;
use App\Model\IdCard\IdCardTemplate;
use App\Model\ReportFor;
use App\Student;
use Barryvdh\DomPDF\Facade as PDF;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
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
    	 	 $classTypes=MyFuncs::getClassByHasUser();
             $students=Student::where('student_status_id',1)->get();
    	 return view('admin.student.idCard.class_select_box',compact('classTypes','reportforId','students'));
    	  
    }

    public function store(Request $request)
    { 
          $student=new Student(); 
         
        if ($request->report_for==1) {
        $students=$student->getAllStudents();
        }if ($request->report_for==2) {
          $arr_id =[$request->registration_no];
        $students=$student->getStudentDetailsByArrId($arr_id); 
        }if ($request->report_for==3) { 
         $class_id =[$request->class_id];
          $students=$student->getStudentByClassMultiselectId($class_id); 
        }if ($request->report_for==4) {
         $students=$student->getStudentByClassSection($request->class_id,$request->section_id);
        } 
   if ($request->barcode==1) { 
       foreach ($students as $values) {   
       $value=$values->registration_no;     
       $barcode = new BarcodeGenerator();
       $barcode->setText($value);
       $barcode->setType(BarcodeGenerator::Code128);
       $barcode->setScale(2);
       $barcode->setThickness(25);
       $barcode->setFontSize(10);
       $code = $barcode->generate();
       $data = base64_decode($code);
       $image_name= $value.'.png';     
       $path = Storage_path() . "/app/student/barcode/" . $image_name; 
       file_put_contents($path, $data); 
       }
    }  
      if ($request->student_idcard==1) {
         
         if ($request->template_name==1) {
         $customPaper = array(0,0,322.00,202.80);
        $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.student.idCard.temp1',compact('students','studentP','data'))->setPaper($customPaper, 'landscape'); 
        return $pdf->stream('student_all_report.pdf');
           
         }  
        $customPaper = array(0,0,215.00,322.80);  
        $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.student.idCard.temp2',compact('students'))->setPaper($customPaper, 'landscape'); 
        return $pdf->stream('student_all_report.pdf');
           
      if ($request->template_name==3) {
         $customPaper = array(0,0,215.00,322.80);
        $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.student.idCard.temp3',compact('students'))->setPaper($customPaper, 'landscape'); 
        return $pdf->stream('student_all_report.pdf');
           
         } 
      }
      if ($request->student_idcard==2) {
         
        $customPaper = array(0,0,208.00,307.80);
        $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.student.idCard.perent_idcard',compact('students'))->setPaper($customPaper, 'landscape'); 
        return $pdf->stream('student_all_report.pdf');
      }
     
    	 
    }

    //-----------------------------report----------------------------------------------------
    public function report($value='')
    {
        return view('admin.student.idCard.report.view',compact('students'));
    }
}
