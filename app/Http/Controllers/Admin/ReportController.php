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
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Storage;
use PDF;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\StreamReader;

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
          // return $request;
           if ($request->report_wise==2) { 
                $fieldNames=$request->fild_name; 
                if ($request->report_for==2) {
                 $students = Student::where('id',$request->registration_no)->get(); 
                 } 
                if ($request->report_for==3) {
                      $students = Student::where('class_id',$request->class_id)->where('section_id',$request->section_id)->get(); 
                     }
                 $pdf = PDF::loadView('admin.report.finalReport.filed_wise_pdf',compact('students','fieldNames')); 
                  return $pdf->stream('student_all_report.pdf'); 
           }
       if ($request->report_wise==1) {     
        $sectionWiseDetails=$request->section_wise; 
         if ($request->report_for==2) {
         $students = Student::where('id',$request->registration_no)->get();
         $parents = ParentsInfo::where('student_id',$request->registration_no)->get(); 
         } 
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
        foreach ($students as $student) {
             $docs=$student->documents;
            
           $documentUrl = Storage_path() . '/app/student/document/'.$student->class_id.'/'.$student->section_id.'/'.$student->registration_no.'/profile.pdf';  
          $pdf = PDF::loadView('admin.report.finalReport.pdf_generate',compact('sectionWiseDetails','perentDetails','medicalDetails','siblingDetails','subjectDetails','documentDetails','students','parents','documents','studentMedicalInfos','studentSiblingInfos','studentSubjects','fieldNames'))->save($documentUrl);
          // $path=  public_path('storage/class_test/abc6.pdf');
          
          $path2=  Storage_path('app/'.$student->document->document_url);
          
          
              
         
           $pdfMerge = new Fpdi();
           $dt =array();
           $dt['student']=$documentUrl;
           foreach ($docs as $key=>$document) {
            if ($request->document_marge==1) {
             $dt[$key]=Storage_path('app/'.$document->document_url);  
           }
          }
        
           $files =$dt;
           foreach ($files as $file) {
              $pageCount =$pdfMerge->setSourceFile($file);
              for ($pageNo=1; $pageNo <=$pageCount ; $pageNo++) { 
                  $pdfMerge->AddPage();
                  $pageId = $pdfMerge->importPage($pageNo, '/MediaBox');
                  //$pageId = $pdfMerge->importPage($pageNo, Fpdi\PdfReader\PageBoundaries::ART_BOX);
                  $s = $pdfMerge->useTemplate($pageId, 10, 10, 200);
              }
           }
           $file = uniqid().'.pdf';
           // $pdfMerge->Output('I', 'simple.pdf');

           dd($pdfMerge->Output('I', 'simple.pdf'));
        }
        
          // $pdfTemp=$pdf->stream('student_all_report.pdf'); 

        
      }
   }
    public function finalReportStudentDetailsCheck(Request $request){
          $checkMenuID= $request->id; 
        return view('admin.report.finalReport.section_wise',compact('students','checkMenuID'));

    }

    public function finalReportTest(){

      
        $path=  public_path('storage/class_test/abc.pdf');
        $path2=  public_path('storage/class_test/abc2.pdf');
 
 
         $pdf = new Fpdi();
         $files =[
                 $path,
                 $path2,
               
            ];
         foreach ($files as $file) {
            $pageCount =$pdf->setSourceFile($file);
            for ($pageNo=1; $pageNo <=$pageCount ; $pageNo++) { 
                $pdf->AddPage();
                $pageId = $pdf->importPage($pageNo, '/MediaBox');
                //$pageId = $pdf->importPage($pageNo, Fpdi\PdfReader\PageBoundaries::ART_BOX);
                $s = $pdf->useTemplate($pageId, 10, 10, 200);
            }
         }
         $file = uniqid().'.pdf';
         $pdf->Output('I', 'simple.pdf');
        
         // $fileContent = file_get_contents($path2,'rb'); 
         // $pdf->setSourceFile(StreamReader::createByString($fileContent));
        
         // $tplIdx = $pdf->importPage(1);
         // $pdf->useTemplate($tplIdx, 10, 10, 100);
         // $pdf->SetFont('Helvetica');
         // $pdf->SetTextColor(255, 0, 0);
         // $pdf->SetXY(130, 230);
         // $pdf->Write(0, 'This is just a simple text');
         // dd( $pdf->Output());
              
    }

    //-----------------------genearl-report----------------------------------------------//
  
  public function generalReport(){
    return view('admin.report.generalReport.view',compact('students','checkMenuID')); 
  }

  public function generalReportFor(Request $request){
    
    return view('admin.report.generalReport.stationery',compact('students','checkMenuID')); 
  }   
}

