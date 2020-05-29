<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\CertificateType;
use App\Model\IssueAthortiType;
use App\Model\SignatureStamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SignatureStampController extends Controller
{
    public function index()
    {
    	return view('admin.master.signature.view'); 
    }
    public function addForm($value='')
    {
    	$admins=Admin::orderBy('id','ASC')->get();
        $CertificateTypes=CertificateType::orderBy('name','ASC')->get();
        $IssueAthortiTypes=IssueAthortiType::orderBy('name','ASC')->get();
    	return view('admin.master.signature.add_form',compact('admins','CertificateTypes','IssueAthortiTypes')); 
    }
    public function tableShow()
    {
    	$signatureStamps=SignatureStamp::orderBy('id','ASC')->get();
    	return view('admin.master.signature.table_show',compact('signatureStamps'));  
    }
     public function store(Request $request)
    {  
    	 $rules=[
          
            'certificate_type_id' => 'required', 
            'user_id' => 'required', 
            'stamp_type' => 'required', 
            'signature' => 'required', 
            'stamp' => 'required', 
            'destination' => 'required', 
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
                $signatureStamp=new SignatureStamp();
                $signatureStamp->certificate_type_id=$request->certificate_type_id;
                $signatureStamp->user_id=$request->user_id; 
                $signatureStamp->signature=$signaturename;
                $signatureStamp->stamp=$stampname;
                $signatureStamp->from_date=$request->from_date;
                $signatureStamp->to_date=$request->to_date;
                $signatureStamp->stamp_type=$request->stamp_type;
                $signatureStamp->destination=$request->destination;
                $signatureStamp->status=1;
                $signatureStamp->save();
               $response=['status'=>1,'msg'=>'Created Successfully'];
                return response()->json($response);
             
            }
           }
            else{
               $signatureStamp= new SignatureStamp(); 
               $signatureStamp->certificate_type_id=$request->certificate_type_id;
                $signatureStamp->user_id=$request->user_id; 
                $signatureStamp->from_date=$request->from_date;
                $signatureStamp->to_date=$request->to_date;
                $signatureStamp->stamp_type=$request->stamp_type;
                $signatureStamp->status=1;
               $signatureStamp->save();
               $response=['status'=>1,'msg'=>'Created Successfully'];
               return response()->json($response);  
            }
         }
    }
}
