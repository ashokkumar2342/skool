<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PaymentMode;
use Illuminate\Http\Request;
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
}
