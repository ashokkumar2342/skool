<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\DefaultFeeValue;
use App\Model\PaymentMode;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class FeeDefaultValueController extends Controller
{
    public function index()
    {  
    return view('admin.finance.feedefaultvalue.index',compact('uptoMonthYear','paymentModes','feedefaultvalue','upto_month_year')); 
    }
    public function btnClickByForm($value='')
    {
       $user_id=Auth::guard('admin')->user()->id;
        $academic=new MyFuncs();
        $uptoMonthYear=$academic->getMonthYear();
        $paymentModes=PaymentMode::orderBy('name','ASC')->get();
        $feedefaultvalue= DefaultFeeValue::where('userid',$user_id)->first();
        $manth=@$feedefaultvalue->upto_month;
        $year=@$feedefaultvalue->upto_year;
        $upto_month_year='01'.'-'.'0'.$manth.'-'.$year;
        return view('admin.finance.feedefaultvalue.form',compact('uptoMonthYear','paymentModes','feedefaultvalue','upto_month_year'));  
    }
    public function store(Request $request)
    {   $user_id=Auth::guard('admin')->user()->id;
        $upto_month=date('m',strtotime($request->upto_month_year));
        $upto_year=date('Y',strtotime($request->upto_month_year));
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
    	$feedefaultvalue= DefaultFeeValue::firstOrNew(['userid'=>$user_id]);
    	$feedefaultvalue->userid=$user_id;
    	$feedefaultvalue->upto_month=$upto_month;
    	$feedefaultvalue->upto_year=$upto_year; 
    	$feedefaultvalue->payment_mode=$request->payment_mode;
    	$feedefaultvalue->sibiling_detail=$request->sibiling_detail;
    	$feedefaultvalue->print_receipt=$request->print_receipt; 
    	$feedefaultvalue->save();
    	$response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
    }

    //--------admin-fee-default-value---------------------------------------//

    public function admin($value='')
    {
        return view('admin.finance.feedefaultvalue.admin_default');
    }
    public function adminBtnClickByForm($value='')
    {
       $user_id=Auth::guard('admin')->user()->id;
        $academic=new MyFuncs();
        $uptoMonthYear=$academic->getMonthYear();
        $paymentModes=PaymentMode::orderBy('name','ASC')->get();
        $feedefaultvalue= DefaultFeeValue::where('userid',$user_id)->first();
        $manth=@$feedefaultvalue->upto_month;
        $year=@$feedefaultvalue->upto_year;
        $upto_month_year='01'.'-'.'0'.$manth.'-'.$year;
        return view('admin.finance.feedefaultvalue.admin_form',compact('uptoMonthYear','paymentModes','feedefaultvalue','upto_month_year'));  
    }
    public function adminStore(Request $request)
    {   $user_id=Auth::guard('admin')->user()->id;
        $upto_month=date('m',strtotime($request->upto_month_year));
        $upto_year=date('Y',strtotime($request->upto_month_year));
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
        $feedefaultvalue= DefaultFeeValue::firstOrNew(['userid'=>$user_id]);
        $feedefaultvalue->userid=$user_id;
        $feedefaultvalue->upto_month=$upto_month;
        $feedefaultvalue->upto_year=$upto_year; 
        $feedefaultvalue->payment_mode=$request->payment_mode;
        $feedefaultvalue->sibiling_detail=$request->sibiling_detail;
        $feedefaultvalue->print_receipt=$request->print_receipt; 
        $feedefaultvalue->save();
        $appSetting=AppSetting::firstOrNew(['userid'=>$user_id]);
        $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response);
    }
}
