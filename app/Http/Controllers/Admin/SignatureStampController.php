<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\CertificateType;
use App\Model\Hr\Employee;
use App\Model\IssueAuthortyType;
use App\Model\SignatureStamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use PDF;

class SignatureStampController extends Controller
{
    public function index()
    {
        $CertificateTypes=CertificateType::orderBy('name','ASC')->get();
        $IssueAthortiTypes=IssueAuthortyType::orderBy('name','ASC')->get();
    	return view('admin.master.signature.view',compact('CertificateTypes','IssueAthortiTypes'));  
    }
    public function addForm($id=null)
    {
        if ($id==null) {
            $signatureStamps='';
        }elseif ($id!=null) {
        $signatureStamps=SignatureStamp::find(Crypt::decrypt($id));
        }
    	$Employees=Employee::orderBy('name','ASC')->get();
        $CertificateTypes=CertificateType::orderBy('name','ASC')->get();
        $IssueAthortiTypes=IssueAuthortyType::orderBy('name','ASC')->get();
    	return view('admin.master.signature.add_form',compact('Employees','CertificateTypes','IssueAthortiTypes','signatureStamps')); 
    }
    public function tableShow(Request $request)
    { 
      $signatureStamps=SignatureStamp::where('certificate_type_id',$request->certificate_type)->where('authority_type_id',$request->authority_type)->get();
      $response=array();
      $response["status"]=1;
      $response["data"]=view('admin.master.signature.table_show',compact('signatureStamps'))->render();   
      return $response;
    	 
    }
     public function store(Request $request,$id=null)
    {  
    	 $rules=[
          
            'employee' => 'required', 
            'designation' => 'required', 
            'certificate_type' => 'required', 
            'authority_type' => 'required', 
            'from_date' => 'required', 
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

            if ($request->hasFile('signature')) { 
                $signature=$request->signature;
                $signaturename='signature'.date('d-m-Y').time().'.jpg'; 
                $signature->storeAs('public/signature/',$signaturename);
            if ($request->hasFile('stamp')) { 
                $stamp=$request->stamp;
                $stampname='stamp'.date('d-m-Y').time().'.jpg'; 
                $stamp->storeAs('public/stamp/',$stampname); 
                $signatureStamp=  SignatureStamp::firstOrNew(['id'=>$id]);
                $signatureStamp->certificate_type_id=$request->certificate_type;
                $signatureStamp->emp_id=$request->employee; 
                $signatureStamp->signature=$signaturename;
                $signatureStamp->stamp=$stampname;
                $signatureStamp->from_date=$request->from_date;
                $signatureStamp->to_date=$request->to_date;
                $signatureStamp->authority_type_id=$request->authority_type;
                $signatureStamp->Designation=$request->designation;
                if ($id==null) {
                $signatureStamp->status=0; 
                }
                $signatureStamp->save();
               $response=['status'=>1,'msg'=>'Submit Successfully'];
                return response()->json($response);
             
            }
           }
            else{
               $signatureStamp=   SignatureStamp::firstOrNew(['id'=>$id]);
              $signatureStamp->certificate_type_id=$request->certificate_type;
                $signatureStamp->emp_id=$request->employee; 
                $signatureStamp->from_date=$request->from_date;
                $signatureStamp->to_date=$request->to_date;
                $signatureStamp->authority_type_id=$request->authority_type;
                $signatureStamp->Designation=$request->designation;
                if ($id==null) {
                $signatureStamp->status=0; 
                }
               $signatureStamp->save();
               $response=['status'=>1,'msg'=>'Submit Successfully'];
               return response()->json($response);  
            }
         }
    }
    public function status($id)
    {
          $SignatureStampsss =SignatureStamp::find($id); 
          $SignatureStamps =SignatureStamp::where('authority_type_id',$SignatureStampsss->authority_type_id)->where('certificate_type_id',$SignatureStampsss->certificate_type_id)->get(); 
          foreach ($SignatureStamps as  $value) {
             $SignatureStamp =SignatureStamp::find($value->id);
             $SignatureStamp->status=0;
             $SignatureStamp->save(); 
          }
          $Signature =SignatureStamp::find($id); 
          $Signature->status=1;
          $Signature->save();
       $response=['status'=>1,'msg'=>'Change Successfully'];
         return response()->json($response);
    }
    public function report($value='')
    {
        $CertificateTypes=CertificateType::orderBy('name','ASC')->get();
        $IssueAthortiTypes=IssueAuthortyType::orderBy('name','ASC')->get();
        return view('admin.master.signature.report',compact('CertificateTypes','IssueAthortiTypes')); 
    }
    public function reportGenerate(Request $request)
    {
      if ($request->certificate_type!=null && $request->authority_type!=null) {
         $signatureStamps =SignatureStamp::
                           where('certificate_type_id',$request->certificate_type)
                          ->where('authority_type_id',$request->authority_type)
                          ->get(); 
      }elseif ($request->certificate_type!=null) {
         $signatureStamps =SignatureStamp::
                          where('certificate_type_id',$request->certificate_type)
                          ->get();
      }
        
        
        $pdf=PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.master.signature.report_generate',compact('signatureStamps'));
        return $pdf->stream('signature_stamps.pdf');
        
    }
}
