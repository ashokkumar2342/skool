<?php

namespace App\Http\Controllers\Admin\Fee;

use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\BalanceAmount;
use App\Model\Cashbook;
use App\Model\DefaultFeeValue;
use App\Model\FeeStructureLastDate;
use App\Model\FineScheme;
use App\Model\Month;
use App\Model\PaymentMode;
use App\Model\Schoolinfo;
use App\Model\SiblingGroup;
use App\Model\StudentAddressDetail;
use App\Model\StudentDefaultValue;
use App\Model\StudentFeeDetail;
use App\Model\StudentFeePaidUpTo;
use App\Model\StudentLedger;
use App\Model\StudentPerentDetail;
use App\Model\StudentSiblingInfo;
use App\Model\UserReceipt;
use App\Student;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\increment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDF;
use setasign\Fpdi\Fpdi;

 

class FeeCollectionController extends Controller
{
    public function index(){
       $user_id=Auth::guard('admin')->user()->id;
       $feeStructureLastDates =new  MyFuncs();
       $uptoMonthYears =$feeStructureLastDates->getMonthYear();
    	 $students = array_pluck(Student::get(['id','registration_no']), 'registration_no','id');
       $schoolinfo=Schoolinfo::first();
       $feedefaultvalue= DefaultFeeValue::where('userid',$user_id)->first();
       $manth=@$feedefaultvalue->upto_month;
       $year=@$feedefaultvalue->upto_year;
       if ($manth>9) {
        $upto_month_year='01'.'-'.$manth.'-'.$year; 
       }else{
       $upto_month_year='01'.'-'.'0'.$manth.'-'.$year; 
       }
    	return view('admin.finance.feecollection.fee_collection_form',compact('students','uptoMonthYears','schoolinfo','upto_month_year','feedefaultvalue'));
    }

    // show main form show search stuent form
    public function show(Request $request){  
        $rules=[
             'registration_no' => 'required',
             'fee_paid_upto' => 'required',
            
         ];
         $validator = Validator::make($request->all(),$rules);
         if ($validator->fails()) {
             $errors = $validator->errors()->all();
             $response=array();
             $response["status"]=0;
             $response["msg"]=$errors[0];
             return response()->json($response);// response as json
         }
       $st=new Student();
       $student=$st->getDetailByRegistrationNo($request->registration_no);
       if (empty($student)) {
          $response =array();
          $response['status']=0; 
          $response["msg"] ='Invalid Registration No.';
          return $response; 
        } 
      $user_id=Auth::guard('admin')->user()->id;
      $month =date('m',strtotime($request->fee_paid_upto));
      $year =date('Y',strtotime($request->fee_paid_upto));
      $FeeDetails= DB::select(DB::raw("call up_view_stu_fee_detail ('$student->id','$month','$year')"));
      $siblings= DB::select(DB::raw("call up_view_stu_sibling_fee_detail ('$student->id','$month','$year')"));
      $paymentModes=PaymentMode::all();
      $feedefaultvalue= DefaultFeeValue::where('userid',$user_id)->first();

       $response =array();
       $response['status']=1;
      
    	 $response["data"] = view('admin.finance.feecollection.fee_collection_detail',compact('student','FeeDetails','siblings','paymentModes','month','year','feedefaultvalue'))->render();
    	return $response;
    }


    // show show all fee deatial
    public function feeDetail(Request $request){     
     
    	
    }

    // store fee collection form
    public function store(Request $request){ 
      if ($request->has('is_print')) {
        $is_print = 1;
      }else{
        $is_print = 0;
      }
        $rules=[
             'payment_mode' => 'required',
             'amount_deposit' => 'required', 
         ];
         $validator = Validator::make($request->all(),$rules);
         if ($validator->fails()) {
             $errors = $validator->errors()->all();
             $response=array();
             $response["status"]=0;
             $response["msg"]=$errors[0];
             return response()->json($response);// response as json
         }
       
        $students = array_reverse($request->student_id); 
        $amount_deposits= array_reverse($request->amount_deposit); 
        $user_id = Auth::guard('admin')->user()->id;
        $date = date('Y-m-d');
        $payment_mode =PaymentMode::whereIn('id',$request->payment_mode)->get(); 
        $cheeque_no =$request->cheeque_no; 
        $bank_name =$request->bank_name; 
        $payment_mode1 = $request->payment_mode[0]; 
        $payment_mode2=0;
        if (!empty($request->payment_mode[1])) {
          $payment_mode2 = $request->payment_mode[1]; 
        }        
        $amount1 = $request->amount[0]; 
        $amount2 = 0;
        if (!empty($request->amount[1])) {
           $amount2 = $request->amount[1]; 
        }       
        $bank_name1 = $request->bank_name[0]; 
        $bank_name2 ='';
        if (!empty($request->bank_name[1])) {
           $bank_name2 = $request->bank_name[1]; 
        }        
        $cheeque_no1 = $request->cheeque_no[0]; 
        $cheeque_no2 ='';
        if (!empty($request->cheeque_no[1])) {
            $cheeque_no2 = $request->cheeque_no[1];  
        } 
       $temp_id= $request->template;
       $feedefaultvalue= DefaultFeeValue::where('userid',$user_id)->first();
        $receipt_id =array();
        foreach ($students as $key => $student_id) { 
          $deposit = $amount_deposits[$key];     
         $receipt_id[]= $FeeDetails= DB::select(DB::raw("call up_stu_fee_submit ('$user_id','$student_id','$request->month','$request->year','$deposit','$payment_mode1','$amount1','$bank_name1','$cheeque_no1','$date','$payment_mode2','$amount2','$bank_name2','$cheeque_no2','$date')"));   
        }
        $response = array();
        $response['status']=1;
        $response['msg']='Fee Submit Successfully.';
         
        $r_arr_id= array();
        foreach ($receipt_id as  $key=>$value) {          
          $r_id= $value[0]->receipt_id; 
          $r_arr_id[]=$r_id;
          $feeDetails =DB::select(DB::raw("call up_show_fee_receipt_fee_detail ('$r_id')"));
         $student=DB::select(DB::raw("call up_show_fee_receipt_stu_detail ('$r_id')"));
         
         //pdf generate reciept
         $path =Storage_path() . '/app/student/feereceipt/';          
           @mkdir($path, 0755, true); 
           $pdf = PDF::setOptions([
             'logOutputFile' => storage_path('logs/log.htm'),
             'tempDir' => storage_path('logs/')
         ])
         ->loadView('admin.finance.feecollection.pdf_'.$temp_id.'',compact('feeDetails','student','payment_mode','cheeque_no','bank_name','feedefaultvalue'))->save($path.$r_id.'.pdf'); 
           
        }

        $response['data']= view('admin.finance.feecollection.receipt_print_1',compact('r_arr_id','is_print','feedefaultvalue'))->render();
        
        
       return $response;
      
    }

    // store fee collection form
    public function print(Request $request){
        $r_arr_id= $request->all(); 
        $pdfMerge = new Fpdi();
        $dt =array();         
        foreach ($r_arr_id as $key => $value) { 
            $dt[]=Storage_path() . '/app/student/feereceipt/'.$key.'.pdf'; 
        }       
        
        $files =$dt;
        foreach ($files as $file) {
           $pageCount =$pdfMerge->setSourceFile($file);
           for ($pageNo=1; $pageNo <=$pageCount ; $pageNo++) { 
               $pdfMerge->AddPage();
               $pageId = $pdfMerge->importPage($pageNo, '/MediaBox');                       
               $s = $pdfMerge->useTemplate($pageId, 10, 10, 200);
           }
        }
        $file = uniqid().'.pdf';                 
       dd($pdfMerge->Output('I', 'simple.pdf'));
      
    }

    public function PreviousReceipts()
    {
       $user_id=Auth::guard('admin')->user()->id;
       $UserReceipts=UserReceipt::where('user_id',$user_id)->get();
       return view('admin.finance.feecollection.previous_receipts',compact('UserReceipts'))->render();
    }
    public function PreviousReceiptsRemove()
    {
       $user_id=Auth::guard('admin')->user()->id; 
       $UserReceipts=UserReceipt::where('user_id',$user_id)->delete(); 
       $response = array();
       $response['status']=1;
       $response['msg']='Clear Successfully.';
       return $response;
       
    }
}
