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
             $studentArrId=$students->pluck('id')->toArray();
    	 }
    	 elseif ($request->report_for==2) {
    	 	$student= new Student();
    	 	$students=$student->getStudentDetailsByArrId([$request->registration_no]);
    	 	 $studentArrId=$students->pluck('id')->toArray(); 
    	 }
    	 elseif ($request->report_for==3) {
    	 	$student= new Student();
    	 	$students=$student->getStudentByClassMultiselectId([$request->class_id]);
    	 	 $studentArrId=$students->pluck('id')->toArray();
    	 }
    	 elseif ($request->report_for==4) {
    	 	$student= new Student();
    	 	$students=$student->getStudentByClassSection($request->class_id,$request->section_id);
    	 	$studentArrId=$students->pluck('id')->toArray(); 
    	 } 
          if ($request->document_wise==1) {
               $documents=Document::where('document_type_id',$request->document_type_id)->whereIn('student_id',$studentArrId)->with('students')->get();
             $response=array();
             $response['status']=1;
             $response['data']=view('admin.documentReport.result',compact('documents','studentdocuments'))->render();;
             return $response;
            }
          elseif ($request->without_document_wise==1) {
           $withoutdocuments=Document::where('document_type_id',$request->document_type_id)->pluck('student_id')->toArray();

           $students= Student::whereNotIn('id',$withoutdocuments)->get();
             $response=array();
             $response['status']=1;
             $response['data']=view('admin.documentReport.without_document_list',compact('students'))->render();;
             return $response;
              
          }elseif ($request->without_image_wise==1) { 
             $students= Student::whereIn('id',$studentArrId)->where('picture',null)->get();
             $response=array();
             $response['status']=1;
             $response['data']=view('admin.documentReport.without_document_list',compact('students'))->render();;
             return $response;
              
          }
          
          
    	 
    }
}
