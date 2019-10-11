<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PaymentMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use PDF;
class PaymentModeController extends Controller
{
    public function index(){
    	$paymentmodes = PaymentMode::orderBy('sorting_order_id','ASC')->get();
        return view('admin.master.paymentmode.list',compact('paymentmodes'));

    }

    public function store(Request $request)
    {
        $admin=Auth::guard('admin')->user()->id;
        $validator = Validator::make($request->all(), [
        
           'name' => 'required|max:30|unique:payment_modes',
           'sorting_order_id' => 'required|max:2|unique:payment_modes',  
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']);  
        }
         
       $paymentmode = new PaymentMode();
       $paymentmode->name = $request->name; 
       $paymentmode->sorting_order_id = $request->sorting_order_id;
       $paymentMode->last_updated_by=$admin; 
       $paymentmode->save();
       return response()->json([$paymentmode,'class'=>'success','message'=>'Payment Mode Created Successfully']);
    }

    public function edit($id)
    {   
        $id =Crypt::decrypt($id); 
        $paymentMode =PaymentMode::find($id); 
        return view('admin.master.paymentmode.edit',compact('paymentMode')); 
        
    }

    public function update(Request $request,$id)
    {   
        $id =Crypt::decrypt($id); 
        $rules=[
        'name' => 'required|max:30|unique:payment_modes,name,'.$id,
        'sorting_order_id' => 'required|max:2|unique:payment_modes,sorting_order_id,'.$id,
         
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }    
       
         
        $admin=Auth::guard('admin')->user()->id;
        
        $paymentMode =PaymentMode::find($id); 
        $paymentMode->name = $request->name; 
        $paymentMode->sorting_order_id = $request->sorting_order_id; 
        $paymentMode->last_updated_by=$admin; 
        $paymentMode->save(); 
        $response = array();
        $response['status'] = 1; 
        $response['msg'] = 'Update Successfully'; 
        return $response; 
        
    }

    public function destroy($id)
    {  
        $id =Crypt::decrypt($id);

        $PaymentMode =PaymentMode::find($id);
        $PaymentMode->delete();
        return  redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
    public function pdfGenerate()
    {  
         $PaymentMode =PaymentMode::orderBy('sorting_order_id','ASC')->get();
         $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])
        ->loadView('admin.master.paymentmode.pdf_generate',compact('PaymentMode')); 
         return $pdf->stream('paymentmode.pdf');
         
    }
}
