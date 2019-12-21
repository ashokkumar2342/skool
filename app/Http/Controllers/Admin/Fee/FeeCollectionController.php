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
     $toDate =$request->StudentFeeDetailMonthYear;
     $BalanceAmount=0;
      $fromDate=$StudentFeeDetails = StudentFeeDetail::whereDate('last_date',$toDate)->first()->from_date;
      $student = Student::find($request->student_id);
       $studentSibling=new SiblingGroup();
       $siblings=$studentSibling->getSiblingByStudentId($request->student_id);
      

      $StudentFeeDetail = new StudentFeeDetail(); 
      $StudentFeeDetails = $StudentFeeDetail->getFeeDetailsByUpTodate($toDate,$request->student_id); 
                        
      $FeeDetails=$StudentFeeDetails->groupBy('name');
      $paymentModes=PaymentMode::all();                               
      $FineSchemes=FineScheme::get();                               
      $Balance=BalanceAmount::where('student_id',$request->student_id)->first();
      if ($Balance!=null) {
        $BalanceAmount=$Balance->balance_amount;
        }                               
      $data = view('admin.finance.feecollection.fee_detail_show',compact('FeeDetails','siblings','request','student','paymentModes','toDate','BalanceAmount','FineSchemes'))->render();
      return response()->json($data);     
       // $fromFullDate = StudentFeeDetail::where('student_id',$request->student_id)->whereMonth('last_date' , $request->month)->whereYear('last_date' , $request->year)->first()->from_date; 
      //  $lastFullDate = StudentFeeDetail::where('student_id',$request->student_id)->whereMonth('last_date' , $request->month)->whereYear('last_date' , $request->year)->first()->last_date;   
 
      //   $day =date('d',strtotime($lastFullDate));
      //   $toMonth= $request->month;
      //  // Specify the start date. This date can be any English textual format  
      //  $date_from = date('Y-m-d',strtotime($fromFullDate ."+9 days"));   

      //  $date_from = strtotime($date_from); // Convert date to a UNIX timestamp  
         
      //  // Specify the end date. This date can be any English textual format  
      // $date_to =  $request->year.'-'.$request->month.'-'.$day;  
      //  $date_to = strtotime($date_to); // Convert date to a UNIX timestamp  
      //    $monthArr=array();
      //  // Loop from the start date to end date and output all dates inbetween  
      //  for ($i=$date_from; $i<=$date_to; $i+=2628000) {  
      //      echo $date_create=  date("Y", $i).'-'.date("m", $i).'-'.$day;  
      //       $monthArr[]=$date_create; 
      //  }
                                                                     
                             
       // $StudentFeeDetails = StudentFeeDetail::where('student_id',$request->student_id)
       //                            ->whereIn('last_date',$monthArr)
       //                            ->where('paid',0)
       //                            ->get(); 

        
    	// $StudentFeeDetails = StudentFeeDetail::where('student_id',$request->student_id)->whereIn(DB::raw('MONTH(last_date)'), $monthArr)->whereYear('last_date' , $request->year)->where('paid',0)->get(); 
    	 
    	
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
        $payment_mode1 = $request->payment_mode[0]; 
        $payment_mode2 = $request->payment_mode[1]; 
        $amount1 = $request->amount[0]; 
        $amount2 = $request->amount[1]; 
        $bank_name1 = $request->bank_name[0]; 
        $bank_name2 = $request->bank_name[1]; 
        $cheeque_no1 = $request->cheeque_no[0]; 
        $cheeque_no2 = $request->cheeque_no[1]; 
        $receipt_id =array();
        foreach ($students as $key => $student_id) { 
          $deposit = $amount_deposits[$key];     
         $receipt_id[]= $FeeDetails= DB::select(DB::raw("call up_stu_fee_submit ('$user_id','$student_id','$request->month','$request->year','$deposit','$payment_mode1','$amount1','$bank_name1','$cheeque_no1','$date','$payment_mode2','$amount2','$bank_name2','$cheeque_no2','$date')"));   
        }

        return $receipt_id;
        // return response()->json(['message'=>'Successfully','status'=>'success']);
        $data = view('admin.finance.feecollection.print',compact('cashbooks','request'))->render();
        return response()->json($data);
       
    }

    // store fee collection form
    public function print(Request $request){
      
       $students = $request->student_id; 
       // foreach ($students as $key => $student) {
       //     $student = Student::find($student);
       //     $StudentFeeDetails = StudentFeeDetail::where('student_id',$student->id)->whereMonth('from_date' , $request->month)->whereYear('from_date' , $request->year)->get();
       //     } 
    }
}
