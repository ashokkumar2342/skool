<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PaymentMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class PaymentModeController extends Controller
{
    public function index(){
    	$paymentmodes = PaymentMode::all();
        return view('admin.master.paymentmode.list',compact('paymentmodes'));

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        
            'name' => 'required',  
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']);  
        }
       $paymentmode = new PaymentMode();
       $paymentmode->name = $request->name; 
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
        $paymentMode =PaymentMode::find($id); 
        $paymentMode->name = $request->name; 
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
}
