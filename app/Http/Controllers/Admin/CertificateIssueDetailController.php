<?php

namespace App\Http\Controllers\admin;

use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\CertificateIssueDetail;
use App\Model\ClassType;
use App\Model\HistoryCertificateIssue;
use App\Model\ReportRequest;
use App\Model\Section;
use App\Model\Sms\SmsTemplate;
use App\Model\StudentDefaultValue;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDF;
use Storage;


class CertificateIssueDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $st=new Student();
        $students=$st->getStudentAllDetails(); 
        $certificates =CertificateIssueDetail::where('status',3)->orderBy('created_at','desc')->get();

        return view('admin.certificate.certificate_table_show',compact('certificates','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students=Student::where('student_status_id',1)->get();
         $academicYears=AcademicYear::orderBy('id','ASC')->get();
         $default = StudentDefaultValue::find(1);
        return view('admin.certificate.form',compact('students','academicYears','default'));
    }
   

    public function print(CertificateIssueDetail $certificate)
    {     
        // return $certificate;
     $pdf = PDF::loadView('admin.certificate.certificate', compact('certificate')); 
     // $data = new HistoryCertificateIssue();
     $data = HistoryCertificateIssue::firstOrNew(['student_id'=> $certificate->student_id,'certificate_type'=>$certificate->certificate_type]);

     $filename = date('d_m_Y_h_i_s'). '.' . 'pdf'; 
     $file_name = date('d_m_Y_h_i_s'); 

     $data->student_id = $certificate->student_id;
     $data->certificate_type = $certificate->certificate_type;
     $data->file_name = $file_name;
     $data->save();
     file_put_contents("certificate/$filename", $pdf->output()); 
     return $pdf->stream('invoice.pdf');
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  $admin= Auth::guard('admin')->user()->id;   
      $rules=[
        
            "academic_year_id" => 'required',            
             "registration_no" => 'required|max:20', 
             "date" => 'required|date',
             "certificate_type" => 'required',
             
       
      ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
        else {
             $student = Student::where('id',$request->registration_no)->first();  
            $certificate = new CertificateIssueDetail(); 
             $certificate->academic_year_id =$request->academic_year_id; 
             $certificate->student_id =  $student->id; 
             $certificate->date= $request->date == null ? $request->date : date('Y-m-d',strtotime($request->date)); 
             $certificate->reason = $request->reason;
             $certificate->slc_no = $request->slc_no;
             $certificate->udise_code = $request->udise_code;
             $certificate->department_school_code = $request->department_school_code;
             $certificate->file_no = $request->file_no;
             $certificate->certificate_type = $request->certificate_type;
             $certificate->apply_by = $admin; 
             if ($request->hasFile('attachment')) { 
                    $attachment=$request->attachment;
                    $filename='attech'.date('d-m-Y').time().'.pdf'; 
                    $attachment->storeAs('student/document/certificate/attech/',$filename);
                    $certificate->attachment=$filename; 
                    $certificate->save();
                    $response=['status'=>1,'msg'=>'Apply Certificate Successfully'];
                    return response()->json($response);
             } 

        }
        $certificate->save();
                $response=['status'=>1,'msg'=>'Apply Certificate Successfully'];
                return response()->json($response);           

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CertificateIssueDetail  $certificateIssueDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CertificateIssueDetail $certificate)
    {
        return view('admin.certificate.show',compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CertificateIssueDetail  $certificateIssueDetail
     * @return \Illuminate\Http\Response
     */
    public function verifyStatus($id)
    {  
        $admins= Auth::guard('admin')->user()->id;
         $certificate = CertificateIssueDetail::find($id);
         $certificate->status = 2;
         $certificate->virify_by =$admins;
         $certificate->save();
         $response=['status'=>1,'msg'=>'Virify Successfully'];
         return response()->json($response);
          

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CertificateIssueDetail  $certificateIssueDetail
     * @return \Illuminate\Http\Response
     */
    public function verifyRejectStatus($id)
    {
        $admins= Auth::guard('admin')->user()->id;
        $certificate = CertificateIssueDetail::find($id);
         $certificate->status =4;
         $certificate->reject_by =$admins;
         $certificate->save();
         $response=['status'=>1,'msg'=>'Reject Successfully'];
         return response()->json($response);   
         
    }

   
     
    public function download(CertificateIssueDetail $certificate)
    {  
        $st=new Student();
        $student=$st->getStudentDetailsById($certificate->student_id); 
        $CertificateIssueDetail=CertificateIssueDetail::where('student_id',$certificate->student_id)->first(); 
           $documentUrl = Storage_path() . '/app/student/document/certificate';
            if ($certificate->certificate_type==4) {
              return response()->file($documentUrl.'/'.$certificate->students->registration_no.'_date_of_birth_certificate.pdf');
             } 
             if ($certificate->certificate_type==3) {
              return response()->file($documentUrl.'/'.$certificate->students->registration_no.'_character_certificate.pdf');
             } 
             if ($certificate->certificate_type==2) {
              return response()->file($documentUrl.'/'.$certificate->students->registration_no.'_leaving_certificate.pdf');
             } 
             
    }
    public function attachDownload($id)
    { 
         $documentUrl = Storage_path() . '/app/student/document/certificate/attech/'.$id;
            
              return response()->file($documentUrl);
           
    }

    //verify
    public function verify(Request $request, CertificateIssueDetail $certificate)
    {      $certificates =CertificateIssueDetail::where('status',1)->orderBy('created_at','desc')->get();
          return view('admin.certificate.virify',compact('certificates','students'));
         

    }
     public function tableShow()
    {
        $certificates =CertificateIssueDetail::where('status',1)->orderBy('created_at','desc')->get();
        $admin=Auth::guard('admin')->user()->id;
         $st=new Student();
        $students=$st->getStudentAllDetails();
        return view('admin.certificate.virify_list',compact('certificates','admin','students'));
    }

    //aproval
    public function approval(Request $request, CertificateIssueDetail $certificate)
    {  
          $certificates =CertificateIssueDetail::where('status',2)->orderBy('created_at','desc')->get();
           $st=new Student();
        $students=$st->getStudentAllDetails();
         return view('admin.certificate.approval',compact('certificates','students'));
        
    }
    public function approvalCheck(Request $request,$id)
    {    $admin= Auth::guard('admin')->user()->id; 
         $certificate = CertificateIssueDetail::find($id);
          $certificate->status =3;
          $certificate->approval_by =$admin;
          $certificate->save();
          $st=new Student();
        $student=$st->getStudentDetailsById($certificate->student_id); 
        $CertificateIssueDetail=CertificateIssueDetail::where('student_id',$certificate->student_id)->first(); 
           $documentUrl = Storage_path() . '/app/student/document/certificate';
           @mkdir($documentUrl, 0755, true); 
                if ($certificate->certificate_type==4) {
                $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.certificate.tuitionfee.date_of_birth_certificate',compact('student'))->save($documentUrl.'/'.$certificate->students->registration_no.'_date_of_birth_certificate.pdf'); 
                 
                 } elseif ($certificate->certificate_type==2) {
                $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.certificate.tuitionfee.leaving_certificate',compact('student','CertificateIssueDetail'))->save($documentUrl.'/'.$certificate->students->registration_no.'_leaving_certificate.pdf'); 
                 
                 } elseif ($certificate->certificate_type==3) {
                $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.certificate.tuitionfee.character_certificate',compact('student'))->save($documentUrl.'/'.$certificate->students->registration_no.'_character_certificate.pdf'); 
                 
                
             }
          return redirect()->back()->with(['message'=>'Approval Successfully','class'=>'success']); 

    }
     
   public function approvalReject(Request $request,$id)
    {
        
         $admin= Auth::guard('admin')->user()->id; 
         $certificate = CertificateIssueDetail::find($id);
          $certificate->status =4;
          $certificate->reject_by =$admin;
          $certificate->save();
          return redirect()->back()->with(['message'=>'Reject Successfully','class'=>'success']); 
          

         
    }
    public function checkStatus()
    {
         $students=Student::where('student_status_id',1)->get();
         return view('admin.certificate.check_status',compact('certificates','students'));
    }
    public function checkStatusShow(Request $request)
    {
        if ($request->registration_no!=null &&  $request->certificate_type_id==0){
            $CertificateIssueDetail =  CertificateIssueDetail::where('student_id',$request->registration_no)->get(); 
        }elseif ($request->registration_no!=null &&  $request->certificate_type_id!=null){
            $CertificateIssueDetail =  CertificateIssueDetail::where('student_id',$request->registration_no)->where('certificate_type',$request->certificate_type_id)->get();  
        }elseif ($request->registration_no!=null){
            $CertificateIssueDetail =  CertificateIssueDetail::where('student_id',$request->registration_no)->get();  
        }
        
       $response = array();
        $response['status'] = 1;
        $response['data'] = view('admin.certificate.check_status_show',compact('CertificateIssueDetail'))->render();
        return $response;
    }
        
    public function CertificateCardMail($certificate_type,$id)
    {
        
     $CertificateIssueDetail =  CertificateIssueDetail::find($id);
        $st=new Student();
        $student=$st->getStudentDetailsById($CertificateIssueDetail->student_id);
        $documentUrl = Storage_path() . '/app/student/certificateissu/';
         @mkdir($documentUrl, 0755, true);
         if ($certificate_type==2) {
         $pdf = PDF::loadView('admin.certificate.tuitionfee.leaving_certificate',compact('student','CertificateIssueDetail'))->save($documentUrl.'/'.$student->registration_no.'_leaving_certificate.pdf');
         } 
         if ($certificate_type==3) {
         $pdf = PDF::loadView('admin.certificate.tuitionfee.character_certificate',compact('student'))->save($documentUrl.'/'.$student->registration_no.'_character_certificate.pdf');
         } 
         if ($certificate_type==4) {
         $pdf = PDF::loadView('admin.certificate.tuitionfee.date_of_birth_certificate',compact('student'))->save($documentUrl.'/'.$student->registration_no.'_date_of_birth_certificate.pdf');
         }
         if ($certificate_type==2) { 
         $url =$documentUrl.$student->registration_no.'_leaving_certificate.pdf';
         }if ($certificate_type==3) { 
         $url =$documentUrl.$student->registration_no.'_character_certificate.pdf';
         }if ($certificate_type==4) { 
         $url =$documentUrl.$student->registration_no.'_date_of_birth_certificate.pdf';
         }
        $student = $student;         
        $CertificateIssueDetail = $CertificateIssueDetail;         
        $emailto = $student->addressDetails->address->primary_email;         
        $subject = 'certifiate'; 
        $up_u=array();
         
        $up_u['student']=$student;
         if ($certificate_type==2) {
          $up_u['CertificateIssueDetail']=$CertificateIssueDetail;
         }
        $up_u['subject']=$subject; 
        $mailHelper =new MailHelper();
         if ($certificate_type==2) {
          $mailHelper->mailsendwithattachment('admin.certificate.tuitionfee.leaving_certificate',$up_u,'No-Reply',$subject,$emailto,'noreply@domain.com',5,$url); 
         }if ($certificate_type==3) {
          $mailHelper->mailsendwithattachment('admin.certificate.tuitionfee.character_certificate',$up_u,'No-Reply',$subject,$emailto,'noreply@domain.com',5,$url); 
         }if ($certificate_type==4) {
          $mailHelper->mailsendwithattachment('admin.certificate.tuitionfee.date_of_birth_certificate',$up_u,'No-Reply',$subject,$emailto,'noreply@domain.com',5,$url); 
         }
         $smsTemplate = SmsTemplate::where('id',1)->first();
         event(new SmsEvent($student->addressDetails->address->primary_mobile,$smsTemplate->message));
        $response = array();
        $response['status'] = 1;
        $response['msg'] = 'Approval Successfully';
        return $response;
    }

    //Tution fee certificate
    public function tuitionFeeShowForm()
    { 
        $students = array_pluck(Student::get(['id','registration_no'])->toArray(), 'registration_no', 'id');
         return view('admin.certificate.tuitionfee.form',compact('students'));
    }

    //show result
    //Tution fee certificate
    public function tuitionFeeShowResult(Request $request)
    {  
        $student = Student::find($request->student_id);
         
         $data= view('admin.certificate.tuitionfee.result',compact('student'))->render();
         return response()->json($data);
    }

    //pdf print 
    public function tuitionPrint($id)
    {     
         
        $student = Student::find($id);

     $pdf = PDF::loadView('admin.certificate.tuitionfee.print',compact('student')); 
     // $data = new HistoryCertificateIssue();
     // $data = HistoryCertificateIssue::firstOrNew(['student_id'=> $certificate->student_id,'certificate_type'=>$certificate->certificate_type]);

     // $filename = date('d_m_Y_h_i_s'). '.' . 'pdf'; 
     // $file_name = date('d_m_Y_h_i_s'); 

     // $data->student_id = $certificate->student_id;
     // $data->certificate_type = $certificate->certificate_type;
     // $data->file_name = $file_name;
     // $data->save();
     // file_put_contents("certificate/$filename", $pdf->output()); 
     return $pdf->stream('invoice.pdf');
    
    }
    public function reportWise(Request $request){
        
          $reportWise=$request->id;
          $registrationNOs=Student::orderBy('id','ASC')->get();
          $classTypes=MyFuncs::getClassByHasUser(); 
          return view('admin.certificate.tuitionfee.all_report',compact('reportWise','registrationNOs','classTypes'));
    }
    public function reportClassWithSection(Request $request){
        
        $sections=Section::where('class_id',$request->id)->get();
        return view('admin.certificate.tuitionfee.class_wise_section',compact('sections'));
    }
    public function reportCertificateGenerate(Request $request){
             
            $student=Student::where('id',$request->registration_no)->where('student_status_id',1)->first();
           if ($request->report_wise==2) { 
                if ($request->report_for==1) {
                $pdf = PDF::loadView('admin.certificate.tuitionfee.print',compact('student')); 
                return $pdf->stream('invoice.pdf'); 
                 }  
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
        $reportRequest=new ReportRequest();
        if ($request->report_wise==1) { 
          $reportRequest->report_wise=1;  
           
        }
        if ($request->report_wise==3) { 
           $reportRequest->class_id=$request->class_id;
           $reportRequest->report_wise=3;  
            
        }
        if ($request->report_wise==4) {  
          $reportRequest->class_id=$request->class_id;
          $reportRequest->section_id=$request->section_id;
          $reportRequest->report_wise=4;  
          
        }
        $reportRequest->report_type_id=$request->report_for;
        $reportRequest->status=0;
        $reportRequest->save(); 
        return  redirect()->back()->with(['message'=>'Successfully','class'=>'success']);
        }  
       }

      
    
    public  function reportRequestShow(Request $request)
    {
       $reportRequests=ReportRequest::all();
       return view('admin.certificate.tuitionfee.report_request',compact('reportRequests'));  
    }
    public function reportRequestPendingGenerate(Request $request,$student_id,$report_type_id)
    {
        $zip_file = 'invoices.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = storage_path('app/student/document/certificate/fee_certificate');
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file)
        {
            // We're skipping all subfolders
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();
                // extracting filename with substr/strlen
                $relativePath = 'fee_certificate/' . substr($filePath, strlen($path) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return response()->download($zip_file); 
          return [$student_id,$report_type_id];
        $students=Student::find($student_id);
        if ($report_type_id==1) {
          $pdf = PDF::loadView('admin.certificate.tuitionfee.print',compact('students')); 
          return $pdf->stream('invoice.pdf'); 
        }
         
    }
}
