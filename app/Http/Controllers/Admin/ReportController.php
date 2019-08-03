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
use App\Model\StudentProfileReport;
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
use Illuminate\Support\Facades\Validator;
use PDF;
use Storage;
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
         $reportforId=$request->id;
         if ($request->id==1) {
             
         }if ($request->id==2) {
            $registrations=Student::orderBy('registration_no','ASC')->get();
             return view('admin.report.finalReport.registration',compact('registrations'));   
         }if ($request->id==3) {
             $classTypes=ClassType::orderBy('id','ASC')->get();
            return view('admin.report.finalReport.class',compact('classTypes','students','reportforId'));  
         }if ($request->id==4) {
             $classTypes=ClassType::orderBy('id','ASC')->get();
            return view('admin.report.finalReport.class',compact('classTypes','students','reportforId'));  
         }
        
    }
    public function finalReportClassWiseSection(Request $request){
        $classWiseSections=Section::where('class_id',$request->id)->get();
        return view('admin.report.finalReport.section',compact('classWiseSections'));
    }
    public function finalReportShow(Request $request){
             
           if ($request->report_for==2) { 
               $fieldNames=$request->fild_name;
                $sectionWiseDetails=$request->section_wise;  
                 $student = Student::where('id',$request->registration_no)->first(); 
                     if ($request->report_wise==2) {
                       $pdf = PDF::loadView('admin.report.finalReport.filed_wise_pdf',compact('student','fieldNames')); 
                        return $pdf->stream('student_all_report.pdf'); 
                     }if ($request->report_wise==1) {
                       
                       $pdf = PDF::loadView('admin.report.finalReport.pdf_generate',compact('student','sectionWiseDetails')); 
                       $path=  public_path('storage/class_test/abc6.pdf');
          
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
            
          $rules=[]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        else { 
        $studentProfileReport=new StudentProfileReport();
        if ($request->report_for==1) { 
          
        }
        if ($request->report_for==3) {
          $studentProfileReport->class_id=$request->class_id; 
          if ($request->report_wise==1) {
            foreach ($request->section_wise as $key => $section_wise) {
               $studentProfileReport->section_name=$section_wise;
             } 
          } 
          if ($request->report_wise==2) {
            foreach ($request->fild_name as $fild_name) {
              $studentProfileReport->field_name=$fild_name;
             } 
          } 
        }if ($request->report_for==4) {
          $studentProfileReport->class_id=$request->class_id;
          $studentProfileReport->section_id=$request->section_id;
          if ($request->report_wise==1) {
            foreach ($request->section_wise as $key => $section_wise) {
               $studentProfileReport->section_name=$section_wise;
             } 
          } 
          if ($request->report_wise==2) {
            foreach ($request->fild_name as $fild_name) {
              $studentProfileReport->field_name=$fild_name;
             } 
          } 
        }
        $studentProfileReport->report_for_id=$request->report_for;
        $studentProfileReport->report_wise_id=$request->report_wise;
        $studentProfileReport->status=0;
        $studentProfileReport->save(); 
        return  redirect()->back()->with(['message'=>'Successfully','class'=>'success']);
        }  
       

       // if ($request->report_wise==1) {     
       //  $sectionWiseDetails=$request->section_wise; 
       //   if ($request->report_for==2) {
       //   $students = Student::where('id',$request->registration_no)->get();
       //   $parents = ParentsInfo::where('student_id',$request->registration_no)->get(); 
       //   } 
       //   if ($request->report_for==3) {
       //    $students = Student::where('class_id',$request->class_id)->where('section_id',$request->section_id)->get(); 
       //   }
        
       //  if ($request->report_for==1) {
       //    $students = Student::orderBy('id','ASC')->get();
       //    $parents = ParentsInfo::orderBy('id','ASC')->get();
       //    $studentSiblingInfos=StudentSiblingInfo::orderBy('id','ASC')->get();
       //    $studentSubjects=StudentSubject::orderBy('id','ASC')->get();
       //    $documents = Document::orderBy('id','ASC')->get(); 
       //  } 
       //  foreach ($students as $student) {
       //       $docs=$student->documents;
            
       //     $documentUrl = Storage_path() . '/app/student/document/'.$student->class_id.'/'.$student->section_id.'/'.$student->registration_no.'/profile.pdf';  
       //    $pdf = PDF::loadView('admin.report.finalReport.pdf_generate',compact('sectionWiseDetails','perentDetails','medicalDetails','siblingDetails','subjectDetails','documentDetails','students','parents','documents','studentMedicalInfos','studentSiblingInfos','studentSubjects','fieldNames'))->save($documentUrl);
       //    // $path=  public_path('storage/class_test/abc6.pdf');
          
       //    $path2=  Storage_path('app/'.$student->document->document_url);
          
          
              
         
       //     $pdfMerge = new Fpdi();
       //     $dt =array();
       //     $dt['student']=$documentUrl;
       //     foreach ($docs as $key=>$document) {
       //      if ($request->document_marge==1) {
       //       $dt[$key]=Storage_path('app/'.$document->document_url);  
       //     }
       //    }
        
       //     $files =$dt;
       //     foreach ($files as $file) {
       //        $pageCount =$pdfMerge->setSourceFile($file);
       //        for ($pageNo=1; $pageNo <=$pageCount ; $pageNo++) { 
       //            $pdfMerge->AddPage();
       //            $pageId = $pdfMerge->importPage($pageNo, '/MediaBox');
       //            //$pageId = $pdfMerge->importPage($pageNo, Fpdi\PdfReader\PageBoundaries::ART_BOX);
       //            $s = $pdfMerge->useTemplate($pageId, 10, 10, 200);
       //        }
       //     }
       //     $file = uniqid().'.pdf';
       //     // $pdfMerge->Output('I', 'simple.pdf');

       //     dd($pdfMerge->Output('I', 'simple.pdf'));
       //  }
        
       //    // $pdfTemp=$pdf->stream('student_all_report.pdf'); 

        
      // }
   }
   public function finalReportPendingShow()
   {
     $studentProfileReports=StudentProfileReport::all();
     return view('admin.report.finalReport.pending_report',compact('studentProfileReports'));  
   }
   public function finalReportPendingDownload(Request $request)
   {
      $zip_file = 'invoices.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = storage_path('app/student/profile');
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file)
        {
            // We're skipping all subfolders
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();
                // extracting filename with substr/strlen
                $relativePath = 'document/' . substr($filePath, strlen($path) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return response()->download($zip_file);
   }
    public function finalReportStudentDetailsCheck(Request $request){
      // return $request;
         $registration= $request->registration_no;
          $checkMenuID= $request->id; 
        return view('admin.report.finalReport.section_wise',compact('students','checkMenuID','registration'));

    }

     

    //-----------------------genearl-report----------------------------------------------//
  
  public function generalReport(){
    return view('admin.report.generalReport.view',compact('students','checkMenuID')); 
  }

  public function generalReportFor(Request $request){
     
         $reportWise=$request->id;
         $students=Student::where('student_status_id',1)->orderBy('class_id','ASC')->get();
         $classTypes=ClassType::orderBy('id','ASC')->get();
    return view('admin.report.generalReport.select_box',compact('students','reportWise','classTypes')); 
  }  
  public function reportGenerateBarcode(Request $request)
   {   

       if ($request->report_wise==1) {
         $students=Student::where('student_status_id',1)->orderBy('class_id','ASC')->get();

       }if ($request->report_wise==2) {
         $students=Student::where('id',$request->registration_no)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
         $StudentSubject=StudentSubject::where('student_id',$request->registration_no)->where('isoptional_id',1)->first();
       }if ($request->report_wise==3) {
        $students=Student::where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
       }
      if ($request->report_for==1) {
        $customPaper = array(0,0,220.00,350.80);
           $pdf = PDF::loadView('admin.report.generalReport.stationery',compact('students','fieldNames','StudentSubject'))->setPaper($customPaper, 'landscape'); 
                        return $pdf->stream('student_all_report.pdf'); 
      }
      if ($request->report_for==2) {
           $customPaper = array(0,0,220.00,350.80);
           $pdf = PDF::loadView('admin.report.generalReport.address',compact('students','fieldNames'))->setPaper($customPaper, 'landscape'); 
                        return $pdf->stream('student_all_report.pdf'); 
      }
      if ($request->report_for==3) {
         $customPaper = array(0,0,260.00,350.80);
           $pdf = PDF::loadView('admin.report.generalReport.id_card',compact('students','fieldNames'))->setPaper($customPaper, 'landscape'); 
                        return $pdf->stream('student_all_report.pdf'); 
      }
      return 'null';
   } 
}

