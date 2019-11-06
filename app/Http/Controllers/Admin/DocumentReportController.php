<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Document;
use App\Model\DocumentType;
use App\Model\ReportFor;
use App\Student;
use Illuminate\Http\Request;

class DocumentReportController extends Controller
{
    public function index($value='')
    {
    	$documentTypes=DocumentType::orderBy('id','ASC')->get();
    	$reportFors=ReportFor::orderBy('id','ASC')->get();
    	return view('admin.documentReport.view',compact('documentTypes','reportFors'));
    }

    public function filter(Request $request)
    {   
    	 if ($request->report_for==1) {
    	 	 $student= new Student();
    	 	 $students=$student->getStudentAllDetails();
    	 }
    	 elseif ($request->report_for==2) {
    	 	$student= new Student();
    	 	$students=$student->getStudentDetailsByArrId([$request->registration_no]);
    	 	  
    	 }
    	 elseif ($request->report_for==3) {
    	 	$student= new Student();
    	 	$students=$student->getStudentByClassMultiselectId([$request->class_id]);
    	 	 
    	 }
    	 elseif ($request->report_for==4) {
    	 	$student= new Student();
    	 	$students=$student->getStudentByClassSection($request->class_id,$request->section_id);
    	 	 
    	 }
    	foreach ($students as $student) { 

			      	$documents=Document::where('document_type_id',$request->document_type_id)->where('student_id',$student->id)->get();
			      	$studentdocuments=$documents;
			      
    	 }
          
    	 $response=array();
    	 $response['status']=1;
    	 $response['data']=view('admin.documentReport.result',compact('documents','studentdocuments'))->render();;
    	 return $response;
    }
}
