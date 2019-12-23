<?php

namespace App\Http\Controllers\Admin\Fee;

use App\Events\SmsEvent;
use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\BalanceAmount;
use App\Model\Cashbook;
use App\Model\FeeStructureLastDate;
use App\Model\FineScheme;
use App\Model\Month;
use App\Model\PaymentMode;
use App\Model\UserReceipt;
use App\Model\SiblingGroup;
use App\Model\StudentAddressDetail;
use App\Model\StudentDefaultValue;
use App\Model\StudentFeeDetail;
use App\Model\StudentFeePaidUpTo;
use App\Model\StudentLedger;
use App\Model\StudentPerentDetail;
use App\Model\StudentSiblingInfo;
use App\Student;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\increment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDF;

 

class FeeCollectionController extends Controller
{
    public function index(){
       
       $feeStructureLastDates =new  MyFuncs();
       $uptoMonthYears =$feeStructureLastDates->getMonthYear();
    	$students = array_pluck(Student::get(['id','registration_no']), 'registration_no','id');    
    	return view('admin.finance.feecollection.fee_collection_form',compact('students','uptoMonthYears'));
    }

    // show main form show search stuent form
    public function show(Request $request){  
        $rules=[
             'student' => 'required',
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
       $student=$st->getDetailByRegistrationNo($request->student); 

      $month =date('m',strtotime($request->fee_paid_upto));
      $year =date('Y',strtotime($request->fee_paid_upto));
      $FeeDetails= DB::select(DB::raw("call up_view_stu_fee_detail ('$student->id','$month','$year')"));
      $siblings= DB::select(DB::raw("call up_view_stu_sibling_fee_detail ('$student->id','$month','$year')"));
      $paymentModes=PaymentMode::all();

       $response =array();
       $response['status']=1;
      
    	 $response["data"] = view('admin.finance.feecollection.fee_collection_detail',compact('student','FeeDetails','siblings','paymentModes','month','year'))->render();
    	return $response;
    }


    // show show all fee deatial
    public function feeDetail(Request $request){     
     
    	
    }

    // store fee collection form
    public function store(Request $request){ 
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
       
        $receipt_id =array();
        foreach ($students as $key => $student_id) { 
          $deposit = $amount_deposits[$key];     
         $receipt_id[]= $FeeDetails= DB::select(DB::raw("call up_stu_fee_submit ('$user_id','$student_id','$request->month','$request->year','$deposit','$payment_mode1','$amount1','$bank_name1','$cheeque_no1','$date','$payment_mode2','$amount2','$bank_name2','$cheeque_no2','$date')"));   
        }
        $response = array();
        $response['status']=1;
        $response['msg']='Fee Submit Successfully.';
        foreach ($receipt_id as  $key=>$value) {
          
          $r_id= $value[$key]->receipt_id;
          $feeDetails =DB::select(DB::raw("call up_show_fee_receipt_fee_detail ('$r_id')"));
         $student=DB::select(DB::raw("call up_show_fee_receipt_stu_detail ('$r_id')"));

         //pdf generate reciept
         $path =Storage_path() . '/app/student/feereceipt/';          
           @mkdir($path, 0755, true); 
           $pdf = PDF::setOptions([
             'logOutputFile' => storage_path('logs/log.htm'),
             'tempDir' => storage_path('logs/')
         ])
         ->loadView('admin.finance.feecollection.print',compact('feeDetails','student'))->save($path.$r_id.'.pdf');
           $response['data']= view('admin.finance.feecollection.print',compact('feeDetails','student','payment_mode','cheeque_no','bank_name'))->render();

           
        }
        
        
       return $response;
      
    }

    // store fee collection form
    public function print(Request $request){
      
       $students = $request->student_id; 
       // foreach ($students as $key => $student) {
       //     $student = Student::find($student);
       //     $StudentFeeDetails = StudentFeeDetail::where('student_id',$student->id)->whereMonth('from_date' , $request->month)->whereYear('from_date' , $request->year)->get();
       //     } 
    }

    public function PreviousReceipts()
    {
       $user_id=Auth::guard('admin')->user()->id;
       $UserReceipts=UserReceipt::where('user_id',$user_id)->get();
       return view('admin.finance.feecollection.previous_receipts',compact('UserReceipts'))->render();
    }
    public function PreviousReceiptsCancel($id)
    {
        
       $UserReceipts=UserReceipt::find($id);
       $UserReceipts->delete();
       $response = array();
       $response['status']=1;
       $response['msg']='Receipt Cancel Successfully.';
       return $response;
       
    }
}
