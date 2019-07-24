<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BloodGroup;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\DiscountType;
use App\Model\Document;
use App\Model\DocumentType;
use App\Model\Gender;
use App\Model\GuardianRelationType;
use App\Model\IncomeRange;
use App\Model\Isoptional;
use App\Model\ParentsInfo;
use App\Model\PaymentType;
use App\Model\Religion;
use App\Model\Section;
use App\Model\SessionDate;
use App\Model\StudentDefaultValue;
use App\Model\StudentFee;
use App\Model\StudentMedicalInfo;
use App\Model\StudentSiblingInfo;
use App\Model\StudentSubject;
use App\Model\Subject;
use App\Model\SubjectType;
use App\Student;
use Auth;
use Carbon;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PDF;
use LynX39\LaraPdfMerger\Facades\PdfMerger;
use Storage;

class ReportController extends Controller
{
    public function index(){
    	$classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');    
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        $bloodgroups = array_pluck(BloodGroup::get(['id','name'])->toArray(),'name', 'id');
    	return view('admin.report.form',compact('classes','sessions','default','genders','religions','categories','bloodgroups'));
    }

    public function reportfilter(Request $request){
    	    
         
        
    	if ($request->report_for == 1 && $request->school_class == 1 ) {
    	   $results = Student::
    	            Join('student_medical_infos', 'students.id', '=', 'student_medical_infos.student_id')    	             
    	            ->where('bloodgroup_id',$request->bloodgroup)
    	            ->get();
    	   return  $this->responseResult($results,$request->student_phone,$request->student_emailtudent_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);
    	}
    	elseif ($request->report_for == 1 &&  $request->school_class == 2){ 
    		$results = Student::
    		            Join('student_medical_infos', 'students.id', '=', 'student_medical_infos.student_id')
    		            ->where('class_id',$request->class)
    		            ->where('section_id',$request->section)
    		            ->where('bloodgroup_id',$request->bloodgroup)    		             
    		            ->get();
    		            
    		return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);  
    	}    	
    	elseif ($request->report_for == 2 && $request->school_class == 1){       
    		$results = Student::where('category_id',$request->category)->get();
                   return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);
    	}
        elseif ($request->report_for == 2 &&  $request->school_class == 2){ 
            $results = Student::where(['class_id'=>$request->class,'section_id'=>$request->section])->where('category_id',$request->category)->get();
                   return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);
                        
            return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);  
        }
        elseif ($request->report_for == 3 && $request->school_class == 1){       
            $results = Student::where('religion_id',$request->religion)->get();
                   return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);
        }
        elseif ($request->report_for == 3 &&  $request->school_class == 2){ 
            $results = Student::where(['class_id'=>$request->class,'section_id'=>$request->section])->where('religion_id',$request->religion)->get();
                   return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);
                        
            return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);  
        }
        elseif ($request->report_for == 4 && $request->school_class == 1){       
            $results = Student::where('gender_id',$request->gender)->get();
                   return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);
        }
        elseif ($request->report_for == 4 &&  $request->school_class == 2){ 
            $results = Student::where(['class_id'=>$request->class,'section_id'=>$request->section])->where('gender_id',$request->gender)->get();
                   return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);
             
        } elseif ($request->report_for == 5 && $request->school_class == 1){       
             $results=Student::where('city','like',$request->city)->get();
              return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);
        
        }
        elseif ($request->report_for == 5 &&  $request->school_class == 2){ 
            $results = Student::where(['class_id'=>$request->class,'section_id'=>$request->section])->where('city','like',$request->city)->get();
                   return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);
             
        }elseif ($request->report_for == 6 && $request->school_class == 1){       
             $results=Student::where('state','like',$request->state)->get();
              return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);
        
        }
        elseif ($request->report_for == 6 &&  $request->school_class == 2){ 
            $results = Student::where(['class_id'=>$request->class,'section_id'=>$request->section])->where('state','like',$request->state)->get();
                   return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);
             
        } elseif ($request->report_for == 7 &&  $request->school_class == 1){ 
            $results = Student::get();
           return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);
             
        } elseif ($request->report_for == 7 &&  $request->school_class == 2){ 
            $results = Student::where(['class_id'=>$request->class,'section_id'=>$request->section])->get();
                    return  $this->responseResult($results,$request->student_phone,$request->student_email,$request->student_dob,$request->student_gen,$request->student_rel,$request->student_add);
             
        }

    	 else{
    	 	return redirect()->route('admin.student.report');
    	 }
     
    }

    public function responseResult($results,$student_phone,$student_email,$student_dob,$student_gen,$student_rel,$student_add){
        $response =array();
            $response['data']= view('admin.report.result',compact('results','student_email','student_phone','student_dob','student_gen','student_rel','student_add'))->render();
            $response['status'] = 1;
            return $response;
    }

    //----------------------final-report-------------------------------------------------------------//
    public function finalReportIndex(){
        $classTypes=ClassType::orderBy('id','ASC')->get();
        $students=Student::orderBy('name','ASC')->get();
    return view('admin.report.finalReport.index',compact('classTypes','students'));
    }
    public function finalReportForChange(Request $request){
        // return $request;
         if ($request->id==1) {
             
         }if ($request->id==2) {
            $registrations=Student::orderBy('registration_no','ASC')->get();
             return view('admin.report.finalReport.registration',compact('registrations'));   
         }if ($request->id==3) {
             $classTypes=ClassType::orderBy('id','ASC')->get();
            return view('admin.report.finalReport.class',compact('classTypes','students'));  
         }
        
    }
    public function finalReportClassWiseSection(Request $request){
        $classWiseSections=Section::where('class_id',$request->id)->get();
        return view('admin.report.finalReport.section',compact('classWiseSections'));
    }
    public function finalReportShow(Request $request){
        
        $studentDetails=$request->student_details;
        $perentDetails=$request->perent_details;
        $medicalDetails=$request->medical_details;
        $siblingDetails=$request->sibling_details;
        $subjectDetails=$request->subject_details;
        $documentDetails=$request->document_details;

         if ($request->report_for==2) {
         $students = Student::where('id',$request->registration_no)->get();
         $parents = ParentsInfo::where('student_id',$request->registration_no)->get(); 
          
          // $documents = Document::where('student_id',$id)->get();
           // $studentSiblingInfos=StudentSiblingInfo::where('student_id',$id)->get();
          // $studentSubjects=StudentSubject::where('student_id',$id)->get();  
         } 
         // if ($request->report_for==1) {
         // $students = Student::orderBy('id','ASC')->get();
         // $parents = ParentsInfo::orderBy('id','ASC')->get();  
         // }
         if ($request->report_for==3) {
          $students = Student::where('class_id',$request->class_id)->where('section_id',$request->section_id)->get(); 
         }
        
        if ($request->report_for==1) {
         $students = Student::orderBy('id','ASC')->get();
         $parents = ParentsInfo::orderBy('id','ASC')->get();
          $studentSiblingInfos=StudentSiblingInfo::orderBy('id','ASC')->get();
          $studentSubjects=StudentSubject::orderBy('id','ASC')->get();
          $documents = Document::orderBy('id','ASC')->get(); 
        } 
         
        
      
      
      
           
      $pdf = PDF::loadView('admin.report.finalReport.pdf_generate',compact('studentDetails','perentDetails','medicalDetails','siblingDetails','subjectDetails','documentDetails','students','parents','documents','studentMedicalInfos','studentSiblingInfos','studentSubjects'));
      
      return $pdf->stream('student_all_report.pdf');
      // $pdfMerger = PDFMerger::init(); //Initialize the merger

      // $pdfMerger->addPDF('samplepdfs/one.pdf', '1, 3, 4');
      // $pdfMerger->addPDF('samplepdfs/two.pdf', '1-2');
      // $pdfMerger->addPDF('samplepdfs/three.pdf', 'all');

      // //You can optionally specify a different orientation for each PDF
      // $pdfMerger->addPDF('samplepdfs/one.pdf', '1, 3, 4', 'L');
      // $pdfMerger->addPDF('samplepdfs/two.pdf', '1-2', 'P');

      // $pdfMerger->merge(); //For a normal merge (No blank page added)

      // // OR..
      // $pdfMerger->duplexMerge(); //Merges your provided PDFs and adds blank pages between documents as needed to allow duplex printing

      // // optional parameter can be passed to the merge functions for orientation (P for protrait, L for Landscape). 
      // // This will be used for every PDF that doesn't have an orientation specified

      // $pdfMerger->save("http://www.africau.edu/images/default/sample.pdf.pdf");

      // // OR...
      // $pdfMerger->save("file_name.pdf", "download");
    }
    public function finalReportStudentDetailsCheck(Request $request){
          $checkMenuID= $request->id; 
        return view('admin.report.finalReport.student_details_select',compact('students','checkMenuID'));

    }
}
