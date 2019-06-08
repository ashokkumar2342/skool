<?php

namespace App\Http\Controllers\Admin\StudentIdCard;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\Event\EveneFor;
use App\Model\IdCard\IdCardTemplate;
use App\Student;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Options;
use Illuminate\Http\Request;

class StudentIdCardController extends Controller
{
    public function index()
    {
    	$studentIDCards=IdCardTemplate::all();
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
        $students=Student::where('class_id',$request->class_id)->get(); 
        //  // PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        // $pdf = PDF::loadView('admin.student.idCard.temp1', compact('students'));
        // $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        // $pdf->setPaper('a4', 'landscape')->setWarnings(false);
        // $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        //return $pdf->stream('IdCard'.date('d-m-Y H:i:s').'.pdf');
        
     
    	return view('admin.student.idCard.temp1', compact('students'));
    }
}
