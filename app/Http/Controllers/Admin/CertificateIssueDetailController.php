<?php

namespace App\Http\Controllers\admin;

use App\Model\HistoryCertificateIssue;
use App\Http\Controllers\Controller;
use App\Model\CertificateIssueDetail;
use App\Student;
use Illuminate\Http\Request;
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
}
