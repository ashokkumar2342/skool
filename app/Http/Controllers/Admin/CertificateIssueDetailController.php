<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\CertificateIssueDetail;
use App\Model\ClassType;
use App\Model\HistoryCertificateIssue;
use App\Model\ReportRequest;
use App\Model\Section;
use App\Student;
use Illuminate\Http\Request;
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
        $certificates =CertificateIssueDetail::orderBy('created_at','desc')->get();
        return view('admin.certificate.apply_list',compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.certificate.form');
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
    {
        if ($request->file('attachment') != null) 
        {
           
         $this->validate($request,[ 
            
             "registration_no" => 'required|max:199',            
              
             "date" => 'required',
             "certificate_type" => 'required|max:199',
             "reason" => 'required|max:199',
             "attachment" => 'mimes:pdf|max:1024',
         ]);   
          
          $student = Student::where('registration_no',$request->registration_no)->first();  
            $certificate = new CertificateIssueDetail();
            $file = $request->file('attachment');
            $file->store('student/document');
            $certificate->attachment = $file->hashName(); 
             $certificate->student_id =  $student->id; 
             $certificate->date= $request->date == null ? $request->date : date('Y-m-d',strtotime($request->date)); 
             $certificate->reason = $request->reason;
             $certificate->certificate_type = $request->certificate_type;
                if($certificate->save())
                {

                 return redirect()->route('admin.student.certificateIssu.list')->with(['message'=>'Apply Certificate Successfully','class'=>'success']);
                } 
                else {
                    return redirect()->route('admin.student.certificateIssu.list')->with(['message'=>'Something went wrong','class'=>'success']); 
                }
        }
        else {
            // return $request->all();

          $this->validate($request,[ 
            
             "registration_no" => 'required|max:199',            
              
             "date" => 'required',
             "certificate_type" => 'required|max:199',
             "reason" => 'required|max:199',
             // "attachment" => 'mimes:pdf|max:1024',
         ]);   
          
            $student = Student::where('registration_no',$request->registration_no)->first();  
            $certificate = new CertificateIssueDetail();
            // $file = $request->file('attachment');
            // $file->store('student/document');
            // $certificate->attachment = $file->hashName(); 
             $certificate->student_id =  $student->id; 
             $certificate->date= $request->date == null ? $request->date : date('Y-m-d',strtotime($request->date)); 
             $certificate->reason = $request->reason;
             $certificate->certificate_type = $request->certificate_type;
                if($certificate->save())
                {

                 return redirect()->route('admin.student.certificateIssu.list')->with(['message'=>'Apply Certificate Successfully','class'=>'success']);
                } 
                else {
                    return redirect()->route('admin.student.certificateIssu.list')->with(['message'=>'Something went wrong','class'=>'success']); 
                }
        

        }    
                 

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
    public function edit(CertificateIssueDetail $certificateIssueDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CertificateIssueDetail  $certificateIssueDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CertificateIssueDetail $certificateIssueDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CertificateIssueDetail  $certificateIssueDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificateIssueDetail $certificateIssueDetail)
    {
        //
    }

    //download
    public function download(CertificateIssueDetail $certificate)
    { 
        $path = storage_path('app/student/document/'.$certificate->attachment);
         return response()->download($path);
    }

    //verify
    public function verify(Request $request, CertificateIssueDetail $certificate)
    { 
         
        $certificate->status = 2;
         if ($certificate->save()) {
              return redirect()->back()->with(['message'=>'Verify Successfully','class'=>'success']);       
            }   
        return redirect()->back()->with(['message'=>'Something went wrong','class'=>'danger']); 

    }

    //aproval
    public function approval(Request $request, CertificateIssueDetail $certificate)
    { 
         $certificate->status = 3;
         if ($certificate->save()) {
              return redirect()->back()->with(['message'=>'Approval Successfully','class'=>'success']);       
            }   
        return redirect()->back()->with(['message'=>'Something went wrong','class'=>'danger']); 
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
          $classTypes=ClassType::orderBy('id','ASC')->get();
          return view('admin.certificate.tuitionfee.all_report',compact('reportWise','registrationNOs','classTypes'));
    }
    public function reportClassWithSection(Request $request){
        
        $sections=Section::where('class_id',$request->id)->get();
        return view('admin.certificate.tuitionfee.class_wise_section',compact('sections'));
    }
    public function reportCertificateGenerate(Request $request){
          // return $request;
       if ($request->report_for==1) {
        if ($request->registratin_no!=null) { 
       $students=Student::where('id',$request->registratin_no)->where('student_status_id',1)->first(); 
         $pdf = PDF::loadView('admin.certificate.tuitionfee.print',compact('students')); 
         return $pdf->stream('invoice.pdf');
         }
         if ($request->report_wise==1) { 
         $students=Student::where('student_status_id',1)->orderBy('class_id','ASC')->get();
         }if ($request->report_wise==3) { 
         $students=Student::where('class_id',$request->class_id)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
         }if ($request->report_wise==4) { 
          $students=Student::where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
         }
        
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
        else {
        foreach ($students as $student) {
        $reportRequest=new ReportRequest();
        $reportRequest->student_id=$student->id;
        $reportRequest->class_id=$student->class_id;
        $reportRequest->section_id=$student->section_id;
        $reportRequest->registration_no=$student->id;
        $reportRequest->report_type_id=$request->report_for;
        $reportRequest->status=0;
        $reportRequest->save();
        }
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        }  
       }

       if ($request->report_for==2) {
         if ($request->registratin_no!=null) {
        $students=Student::where('id',$request->registratin_no)->where('student_status_id',1)->first(); 
             $pdf = PDF::loadView('admin.certificate.tuitionfee.leaving_certificate',compact('students')); 
            return $pdf->stream('invoice.pdf'); 
         }
         if ($request->report_wise==1) { 
         $students=Student::where('student_status_id',1)->orderBy('class_id','ASC')->get();
         }if ($request->report_wise==3) { 
         $students=Student::where('class_id',$request->class_id)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
         }if ($request->report_wise==4) { 
          $students=Student::where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
         } 
        
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
        else {
        foreach ($students as $student) {
        $reportRequest=new ReportRequest();
        $reportRequest->student_id=$student->id;
        $reportRequest->class_id=$student->class_id;
        $reportRequest->section_id=$student->section_id;
        $reportRequest->registration_no=$student->id;
        $reportRequest->report_type_id=$request->report_for;
        $reportRequest->status=0;
        $reportRequest->save();
        }
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        }  
       }if ($request->report_for==3) {
         if ($request->registratin_no!=null) { 
         $students=Student::where('id',$request->registratin_no)->where('student_status_id',1)->first();
         $pdf = PDF::loadView('admin.certificate.tuitionfee.character_certificate',compact('student')); 
         return $pdf->stream('invoice.pdf');
         }
         if ($request->report_wise==1) { 
         $students=Student::where('student_status_id',1)->orderBy('class_id','ASC')->get();
         }if ($request->report_wise==3) { 
         $students=Student::where('class_id',$request->class_id)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
         }if ($request->report_wise==4) { 
          $students=Student::where('class_id',$request->class_id)->where('section_id',$request->section_id)->where('student_status_id',1)->orderBy('class_id','ASC')->get();
         }
        
        
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
        else {
        foreach ($students as $student) {
        $reportRequest=new ReportRequest();
        $reportRequest->student_id=$student->id;
        $reportRequest->class_id=$student->class_id;
        $reportRequest->section_id=$student->section_id;
        $reportRequest->registration_no=$student->id;
        $reportRequest->report_type_id=$request->report_for;
        $reportRequest->status=0;
        $reportRequest->save();
        }
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        }  
       }
       return 'notfound';
    }
    public  function reportRequestShow(Request $request)
    {
       $reportRequests=ReportRequest::all();
       return view('admin.certificate.tuitionfee.report_request',compact('reportRequests'));  
    }
    public function reportRequestPendingGenerate(Request $request,$student_id,$report_type_id)
    {
          
        $students=Student::find($student_id);
        if ($report_type_id==1) {
          $pdf = PDF::loadView('admin.certificate.tuitionfee.print',compact('students')); 
          return $pdf->stream('invoice.pdf'); 
        }
        if ($report_type_id==2) {
          $pdf = PDF::loadView('admin.certificate.tuitionfee.leaving_certificate',compact('students')); 
          return $pdf->stream('invoice.pdf'); 
        }
        if ($report_type_id==3) {
          $pdf = PDF::loadView('admin.certificate.tuitionfee.character_certificate',compact('students')); 
          return $pdf->stream('invoice.pdf'); 
        }
        return 'notfound';
    }
}
