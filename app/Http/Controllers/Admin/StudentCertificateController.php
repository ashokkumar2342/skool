<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\CertificateType;
use App\Model\CharCertIssueDetail;
use App\Model\DOBCertIssueDetail;
use App\Model\ReportTemplate;
use App\Model\SLCIssueDetail;
use App\Model\Schoolinfo;
use App\Model\StudentSportHobby;
use App\Model\SubjectType;
use App\Student;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

class StudentCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $regmaxlength=Schoolinfo::first(); 
        return view('admin.stucertificate.stucharcertificate',compact('regmaxlength'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStudent(Request $request)
    {
        
        $student=Student::where('registration_no',$request->Registration_no)->first();
        if (empty($student->registration_no)) {
          $response=array();
          $response["status"]=0;
          $response["msg"]='Invalid Registration.No.';
          return response()->json($response);
         }
        $CharCertIssueDetails=CharCertIssueDetail::where('StudentInfoId',$student->id)->get();  
        $st=new Student();
        $studentdetail=$st->getStudentDetailsById($student->id);
        $classTypes=MyFuncs::getClassByHasUser();
        $sportsActivityName=StudentSportHobby::where('student_id',$student->id)->first(); 
        return view('admin.stucertificate.showstudent',compact('studentdetail','CharCertIssueDetails','classTypes','sportsActivityName'));
       
    } 
    public function characterCcertificateStore(Request $request)
    { 
        $rules=[
            
       ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
        $user_id=Auth::guard('admin')->user();
        $CharCertIssueDetail=new CharCertIssueDetail();
        $CharCertIssueDetail->UserId=$user_id->id;
        $CharCertIssueDetail->StudentInfoId=$request->student_id;
        $CharCertIssueDetail->DOB=$request->dob;
        $CharCertIssueDetail->ClassPassed=$request->class_id;
        $CharCertIssueDetail->ExamRollNo=$request->Exam_Roll_No;
        $CharCertIssueDetail->ExamHeldOn=$request->Exam_Held_On;
        $CharCertIssueDetail->ExtraActivity=$request->Extra_Activity;
        $CharCertIssueDetail->CharacterType=$request->Character_Type;
        $CharCertIssueDetail->ApplicationDate=$request->Application_Date; 
        if ($request->hasFile('application_attach')) { 
                $application_attach=$request->application_attach;
                $filename='application_attach'.date('d-m-Y').'.pdf'; 
                $application_attach->storeAs('student/certificate/character/',$filename);
                $CharCertIssueDetail->application_attach=$filename;
      }
      $CharCertIssueDetail->save();
      $response=['status'=>1,'msg'=>'Submit Successfully'];
      return response()->json($response);
    }

    public function CharacterCertificateIssue()
    {
      
      return view('admin.stucertificate.stucharcertificate_issue',compact('CharCertIssueDetails')); 
    }
    public function CharacterCertificateIssueClick()
    {
      $CharCertIssueDetails=CharCertIssueDetail::where('status',1)->orderBy('id','DESC')->get();
      return view('admin.stucertificate.table',compact('CharCertIssueDetails')); 
    }
    public function CharacterCertificateIssueTake($id)
    {
      $CharCertIssueDetails=CharCertIssueDetail::find($id);
      return view('admin.stucertificate.take',compact('CharCertIssueDetails'));   
    }
    public function CharacterCertificateIssueTakeStore(Request $request,$id)
        { 
           $user_id=Auth::guard('admin')->user();
           $CharCertIssueDetail=CharCertIssueDetail::find($id);  
           $CharCertIssueDetail->verified_by=$user_id->id;  
           $CharCertIssueDetail->verified_date=date('Y-m-d');  
           $CharCertIssueDetail->status=$request->take;  
           $CharCertIssueDetail->save(); 
           if ($request->take==2) { 
            $response=['status'=>1,'msg'=>'Verify Successfully'];
            return response()->json($response);
           }
           elseif ($request->take==3) {
            $response=['status'=>1,'msg'=>'Reject Successfully'];
            return response()->json($response);
           } 
        }

    public function CharacterCertificateApproval()
    {
       
      return view('admin.stucertificate.approval');    
    }
    public function CharacterCertificateApprovalClick()
    {
      $CharCertIssueDetails=CharCertIssueDetail::where('status',2)->orderBy('id','DESC')->get();
      return view('admin.stucertificate.approval_table',compact('CharCertIssueDetails'));    
    }
    public function CharacterCertificateApprovalTake($id)
    {
      $CharCertIssueDetails=CharCertIssueDetail::find($id);
      return view('admin.stucertificate.approval_take',compact('CharCertIssueDetails'));
    }
    public function CharacterCertificateApprovalTakeStore(Request $request,$id)
    { 
           $user_id=Auth::guard('admin')->user();
           $CharCertIssueDetail=CharCertIssueDetail::find($id);  
           $CharCertIssueDetail->approved_by=$user_id->id;  
           $CharCertIssueDetail->approved_date=date('Y-m-d');  
           $CharCertIssueDetail->status=$request->take;  
           $CharCertIssueDetail->save(); 
           $st=new Student();
           $student=$st->getStudentDetailsById($CharCertIssueDetail->StudentInfoId);
           $reportTemplate=ReportTemplate::where('reports_type_id',2)->where('status',1)->first();
           if (empty($reportTemplate)) {
            $pages='T2_Student_Character_Certificate';
           }
           elseif (!empty($reportTemplate)) {
            $pages=$reportTemplate->name;
           }
           if ($request->take==4) {
            $documentUrl = Storage_path() . '/app/student/certificate/character/';   
               @mkdir($documentUrl, 0755, true); 
            $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.stucertificate.'.$pages,compact('student','CharCertIssueDetail'))->save($documentUrl.$student->registration_no.'_character'.'.pdf');
            $CharCertIssueDetail->Certificate_Path='student/certificate/character/'.$student->registration_no.'_character'.'.pdf';
            $CharCertIssueDetail->save();
            $response=['status'=>1,'msg'=>'Approval Successfully'];
            return response()->json($response);
           }
           elseif ($request->take==3) {
            $response=['status'=>1,'msg'=>'Reject Successfully'];
            return response()->json($response);
           } 
        }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function BirthCertificateApplication()
    {
        $regmaxlength=Schoolinfo::first(); 
        return view('admin.stucertificate.dob.index',compact('regmaxlength'));
    }
    public function BirthCertificateApplicationForm(Request $request)
    {
        $student=Student::where('registration_no',$request->Registration_no)->first();
        if (empty($student->registration_no)) {
          $response=array();
          $response["status"]=0;
          $response["msg"]='Invalid Registration.No.';
          return response()->json($response);
         }
         if (!empty($student->registration_no)) { 
           $st=new Student();
           $studentdetail=$st->getStudentDetailsById($student->id);
           $classTypes=MyFuncs::getClassByHasUser();
           $DOBCertIssueDetails=DOBCertIssueDetail::where('StudentInfoId',$student->id)->get();  
           return view('admin.stucertificate.dob.add_form',compact('studentdetail','DOBCertIssueDetails','classTypes'));
         }
    }
    public function BirthCertificateApplicationStore(Request $request)
    {  
        $rules=[]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
        }
         
        $user_id=Auth::guard('admin')->user();
        $SLCIssueDetail=new DOBCertIssueDetail();
        $SLCIssueDetail->UserId=$user_id->id;
        $SLCIssueDetail->StudentInfoId=$request->student_id;
        $SLCIssueDetail->DOB=$request->dob;
        $SLCIssueDetail->ApplicationDate=$request->Application_Date;
        $SLCIssueDetail->AdmissionNo=$request->Old_Admission_No; 
        $SLCIssueDetail->CharacterType=$request->Character_Type; 
        $SLCIssueDetail->Status=1; 
        $SLCIssueDetail->save();
        $response=['status'=>1,'msg'=>'Submit Successfully'];
        return response()->json($response);
        }

        public function BirthCertificateIssue()
        { 
          return view('admin.stucertificate.dob.issue',compact('DOBCertIssueDetails'));    
        }
        public function BirthCertificateIssueClick()
        {
          $DOBCertIssueDetails=DOBCertIssueDetail::where('status',1)->orderBy('id','DESC')->get();
          return view('admin.stucertificate.dob.table',compact('DOBCertIssueDetails'));    
        }
        public function BirthCertificateIssueTake($id)
        {
          $DOBCertIssueDetails=DOBCertIssueDetail::find($id);
          return view('admin.stucertificate.dob.take',compact('DOBCertIssueDetails'));
        }
        public function BirthCertificateIssueTakeStore(Request $request,$id)
        { 
           $user_id=Auth::guard('admin')->user();
           $DOBCertIssueDetail=DOBCertIssueDetail::find($id);  
           $DOBCertIssueDetail->verified_by=$user_id->id;  
           $DOBCertIssueDetail->verified_date=date('Y-m-d');  
           $DOBCertIssueDetail->status=$request->take;  
           $DOBCertIssueDetail->save(); 
           if ($request->take==2) { 
            $response=['status'=>1,'msg'=>'Verify Successfully'];
            return response()->json($response);
           }
           elseif ($request->take==3) {
            $response=['status'=>1,'msg'=>'Reject Successfully'];
            return response()->json($response);
           } 
        }
        public function BirthCertificateApproval()
        {
          
          return view('admin.stucertificate.dob.approval',compact('DOBCertIssueDetails'));    
        }
        public function BirthCertificateApprovalClick()
        {
          $DOBCertIssueDetails=DOBCertIssueDetail::where('status',2)->orderBy('id','DESC')->get();
          return view('admin.stucertificate.dob.approval_table',compact('DOBCertIssueDetails'));    
        }
        public function BirthCertificateApprovalTake($id)
        {
          $DOBCertIssueDetails=DOBCertIssueDetail::find($id);
          return view('admin.stucertificate.dob.approval_take',compact('DOBCertIssueDetails')); 
        }
        public function BirthCertificateApprovalTakeStore(Request $request,$id)
    { 
           $user_id=Auth::guard('admin')->user();
           $CharCertIssueDetail=DOBCertIssueDetail::find($id);  
           $CharCertIssueDetail->approved_by=$user_id->id;  
           $CharCertIssueDetail->approved_date=date('Y-m-d');  
           $CharCertIssueDetail->status=$request->take;  
           // $CharCertIssueDetail->save(); 
           $st=new Student();
           $student=$st->getStudentDetailsById($CharCertIssueDetail->StudentInfoId);
           $reportTemplate=ReportTemplate::where('reports_type_id',4)->where('status',1)->first();
           if (empty($reportTemplate)) {
            $pages='T2_Student_Birth_Certificate';
           }
           elseif (!empty($reportTemplate)) {
            $pages=$reportTemplate->name;
           }
           if ($request->take==4) {
            $documentUrl = Storage_path() . '/app/student/certificate/dob/';   
               @mkdir($documentUrl, 0755, true); 
            $pdf = PDF::loadView('admin.stucertificate.dob.'.$pages,compact('student','CharCertIssueDetail'))->save($documentUrl.$student->registration_no.'_dob'.'.pdf');
            $CharCertIssueDetail->Certificate_Path='student/certificate/dob/'.$student->registration_no.'_dob'.'.pdf';
            $CharCertIssueDetail->save();
            $response=['status'=>1,'msg'=>'Approval Successfully'];
            return response()->json($response);
           }
           elseif ($request->take==3) {
            $response=['status'=>1,'msg'=>'Reject Successfully'];
            return response()->json($response);
           } 
        }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function LeavingCertificateApplication()
    {
        $regmaxlength=Schoolinfo::first(); 
        return view('admin.stucertificate.leaving.index',compact('regmaxlength'));
    }
    public function LeavingCertificateApplicationForm(Request $request)
    {   
        $student=Student::where('registration_no',$request->Registration_no)->first();
        if (empty($student->registration_no)) {
          $response=array();
          $response["status"]=0;
          $response["msg"]='Invalid Registration.No.';
          return response()->json($response);
         }
         if (!empty($student->registration_no)) { 
           $st=new Student();
           $studentdetail=$st->getStudentDetailsById($student->id);
           $SLCIssueDetails=SLCIssueDetail::where('StudentInfoId',$student->id)->get();
           $classTypes=MyFuncs::getClassByHasUser();
           $subjects=SubjectType::orderBy('name','ASC')->get();
           $feeStructureLastDates =new  MyFuncs();
           $uptoMonthYears =$feeStructureLastDates->getMonthYear();
           $Categorys=Category::orderBy('name','ASC')->get();  
           return view('admin.stucertificate.leaving.add_form',compact('studentdetail','SLCIssueDetails','classTypes','subjects','uptoMonthYears','Categorys'));
         } 
    }
    public function LeavingCertificateApplicationStore(Request $request)
    { 
        $rules=[]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
        }
        
        $user_id=Auth::guard('admin')->user();
        $SLCIssueDetail=new SLCIssueDetail();
        $SLCIssueDetail->UserId=$user_id->id;
        $SLCIssueDetail->StudentInfoId=$request->student_id;
        $SLCIssueDetail->DOB=$request->dob;
        $SLCIssueDetail->ApplicationDate=$request->Application_Date;
        $SLCIssueDetail->OldAdmissionNo=$request->Old_Admission_No;
        $SLCIssueDetail->DateofAdmission=$request->DateofAdmission;
        $SLCIssueDetail->ClassAdmitted=$request->Class_Admitted;
        $SLCIssueDetail->LastClass=$request->Last_Class;
        $SLCIssueDetail->Failed=$request->Failed;
        $SLCIssueDetail->Subjects=$request->Subjects;
        $SLCIssueDetail->Qualified=$request->Qualified;
        $SLCIssueDetail->ClassQualified=$request->Class_Qualified;
        $SLCIssueDetail->ClassQualifiedWords=$request->Class_Qualified_Words;
        $subjectname=SubjectType::find($request->Subjects);
        $SLCIssueDetail->Subjects=$subjectname->name;
        $SLCIssueDetail->SubjectsID=$request->Subjects;
        $SLCIssueDetail->FeePaidUpto=$request->fee_paid_upto; 
        $SLCIssueDetail->AnyFeeConcession=$request->AnyFeeConcession; 
        $SLCIssueDetail->ClassQualifiedWords=$request->Class_Qualified_Words; 
        $SLCIssueDetail->Category=$request->Category; 
        $SLCIssueDetail->DateOfJoinLastClass=$request->DateOfJoinLastClass; 
        $SLCIssueDetail->ExtraActivity=$request->ExtraActivity; 
        $SLCIssueDetail->CharacterType=$request->CharacterType; 
        $SLCIssueDetail->LastResult=$request->LastResult; 
        $SLCIssueDetail->NCCDetail=$request->NCCDetail; 
        $SLCIssueDetail->Attendance=$request->Attendance; 
        $SLCIssueDetail->Nationality=$request->Nationality; 
        $SLCIssueDetail->ReasonLeaving=$request->ReasonLeaving; 
        $SLCIssueDetail->Remarks=$request->Remarks; 
        $SLCIssueDetail->Status=1; 
        $SLCIssueDetail->save();
        $response=['status'=>1,'msg'=>'Submit Successfully'];
        return response()->json($response);
        } 

        public function LeavingCertificateIssue()
        {   
         return view('admin.stucertificate.leaving.issue',compact('SLCIssueDetails'));
        }
        public function LeavingCertificateIssueClick()
        {
         $SLCIssueDetails=SLCIssueDetail::where('status',1)->get();   
         return view('admin.stucertificate.leaving.table',compact('SLCIssueDetails'));     
        } 
        public function LeavingCertificateIssueTake($id)
        {
          $SLCIssueDetails=SLCIssueDetail::find($id);   
          return view('admin.stucertificate.leaving.teak',compact('SLCIssueDetails'));  
        }
        public function LeavingCertificateIssueTakeStore(Request $request,$id)
        { 
           $user_id=Auth::guard('admin')->user();
           $SLCIssueDetails=SLCIssueDetail::find($id);  
           $SLCIssueDetails->verified_by=$user_id->id;  
           $SLCIssueDetails->verified_date=date('Y-m-d');  
           $SLCIssueDetails->IssueDate=date('Y-m-d');  
           $SLCIssueDetails->status=$request->take;  
           $SLCIssueDetails->save(); 
           if ($request->take==2) { 
            $response=['status'=>1,'msg'=>'Verify Successfully'];
            return response()->json($response);
           }
           elseif ($request->take==3) {
            $response=['status'=>1,'msg'=>'Reject Successfully'];
            return response()->json($response);
           } 
        }
        public function LeavingCertificateApproval()
        {
          
         return view('admin.stucertificate.leaving.approval');     
        }
        public function LeavingCertificateApprovalClick()
        {
         $SLCIssueDetails=SLCIssueDetail::where('status',2)->get();   
         return view('admin.stucertificate.leaving.approval_table',compact('SLCIssueDetails'));     
        }
        public function LeavingCertificateApprovalTake($id)
        {
          $SLCIssueDetails=SLCIssueDetail::find($id);   
          return view('admin.stucertificate.leaving.approval_teak',compact('SLCIssueDetails'));  
        }
        public function LeavingCertificateApprovalTakeStore(Request $request,$id)
        { 
           $SlCSrNo=SLCIssueDetail::first();
           $user_id=Auth::guard('admin')->user();
           $SLCIssueDetails=SLCIssueDetail::find($id);
           if (empty($SlCSrNo->SlCSrNo)) {
               $srno=10001; 
            }
            elseif (!empty($SlCSrNo->SlCSrNo)) {
               $srno=$SlCSrNo->SlCSrNo+1; 
            }  
           $SLCIssueDetails->SlCSrNo=$srno;  
           $SLCIssueDetails->approved_by=$user_id->id;  
           $SLCIssueDetails->approved_date=date('Y-m-d');  
           $SLCIssueDetails->status=$request->take;  
           $SLCIssueDetails->save();
           $student=Student::find($SLCIssueDetails->StudentInfoId);
           $reportTemplate=ReportTemplate::where('reports_type_id',3)->where('status',1)->first();
           if (empty($reportTemplate)) {
            $pages='T2_Student_SLC_Certificate';
           }
           elseif (!empty($reportTemplate)) {
            $pages=$reportTemplate->name;
           }
           if ($request->take==4) {
            $documentUrl = Storage_path() . '/app/student/certificate/slc/';   
               @mkdir($documentUrl, 0755, true); 
            $pdf = PDF::loadView('admin.stucertificate.leaving.'.$pages,compact('student','SLCIssueDetails'))->save($documentUrl.$student->registration_no.'_slc'.'.pdf');
            $response=['status'=>1,'msg'=>'Approval Successfully'];
            return response()->json($response);
           }
           elseif ($request->take==3) {
            $response=['status'=>1,'msg'=>'Reject Successfully'];
            return response()->json($response);
           } 
        }


  //----------------print-----------------------------------------------------------
        public function CertificateList()
        {
          $CharCertIssueDetails=CharCertIssueDetail::orderBy('StudentInfoId','ASC')->get();  
          $SLCIssueDetails=SLCIssueDetail::orderBy('StudentInfoId','ASC')->get();  
          $DOBCertIssueDetails=DOBCertIssueDetail::orderBy('StudentInfoId','ASC')->get();  
          return view('admin.stucertificate.certificate_download',compact('CharCertIssueDetails','SLCIssueDetails','DOBCertIssueDetails'));  
        } 
        public function CertificateDownload($id,$condition_id)
        { 
          if ($condition_id==1) {
           $CertificateIssueDetail=CharCertIssueDetail::where('id',$id)->first(); 
           $documentUrl = Storage_path() . '/app/'.$CertificateIssueDetail->Certificate_Path; 
           return response()->file($documentUrl);      
          }
          elseif ($condition_id==3) {
           $CertificateIssueDetail=SLCIssueDetail::where('id',$id)->first();
           $st=new Student();
           $student=$st->getStudentById($CertificateIssueDetail->StudentInfoId); 
           $documentUrl = Storage_path() . '/app/student/certificate/slc/'.$student->registration_no.'_slc'.'.pdf'; 
           return response()->file($documentUrl);      
          } 
          elseif ($condition_id==2) { 
           $DOBCertIssueDetail=DOBCertIssueDetail::where('id',$id)->first(); 
           $documentUrl = Storage_path() . '/app/'.$DOBCertIssueDetail->Certificate_Path; 
           return response()->file($documentUrl);
        }
     }      
}
