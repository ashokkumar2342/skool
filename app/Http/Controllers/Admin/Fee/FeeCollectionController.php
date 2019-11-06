<?php

namespace App\Http\Controllers\Admin\Fee;

use App\Events\SmsEvent;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\BalanceAmount;
use App\Model\Cashbook;
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

 

class FeeCollectionController extends Controller
{
    public function index(){
       
    	$students = array_pluck(Student::get(['id','registration_no']), 'registration_no','id');
    	return view('admin.finance.feecollection.fee_collection_form',compact('students'));
    }

    // show main form show search stuent form
    public function show(Request $request){ 
         
       $st=new Student();
        $student=$st->getStudentDetailsById($request->student_id);
    	 
       $defultDate = StudentDefaultValue::find(1);

      $months=Month::orderBy('id','ASC')->get();
     $StudentFeeDetailMonthYears = StudentFeeDetail::where('student_id',$request->student_id)->where('paid',0)->orderBy('id','ASC')->distinct('last_date')->pluck('last_date')->toArray();
    	$data = view('admin.finance.feecollection.fee_collection_detail',compact('student','defultDate','months','StudentFeeDetailMonthYears','student'))->render();
    	return response()->json($data);
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
        $students = $request->student_id; 
        $toDate =$request->toDate;
        foreach ($students as $key => $id) {
            $st = Student::find($id);          
            $student = $st->getStudentDetailsById($id);          
            $StudentFeeDetail = new StudentFeeDetail(); 
            $StudentFeeDetails = $StudentFeeDetail->getFeeDetailsByToDateStudentId($toDate,$student->id);
            $StudentFeeDetailsArrId =$StudentFeeDetail->getFeeDetailsArrIdByToDateStudentId($toDate,$student->id); 
            $cashbook = new Cashbook();
            $cashbook->student_id = $student->id; 
            $data = Cashbook::first();
            if (empty($data)) { 
             $rn=0; 
            }else{
               $rn = (int)Cashbook::orderBy('id', 'desc')->first()->receipt_no; 
            } 
            $cashbook->receipt_no = $rn+1 ;
          
            $cashbook->receipt_date = date('Y-m-d');
            $cashbook->receipt_amount = $request->net_amount;
            $cashbook->deposit_amount = $request->deposit_amount;
            $cashbook->previous_balance = $request->previous_balance;
            $cashbook->balance_amount = $request->fee_balance;
            $cashbook->concession = $request->concession;
            $cashbook->fine_amount = $request->fine_amount;
            $cashbook->payment_mode = $request->payment_mode;
            $cashbook->refrence_no = $request->refrence_no;
            $cashbook->payment_mode_date = $request->payment_mode_date;
            $cashbook->bank_name = $request->bank_name;
            $cashbook->on_account = 1;
            $cashbook->student_name = $student->name;
            $cashbook->class = $student->classes->name;
            $cashbook->class_id = $student->class_id;
            $cashbook->section_id = $student->section_id;
            $cashbook->roll_no = $student->roll_no;
            $cashbook->registration_no = $student->registration_no;
            $cashbook->father_name = $student->parents[0]->parentInfo->name;
            $cashbook->mother_name = $student->parents[1]->parentInfo->name;
            $cashbook->month = date('m',strtotime($toDate));
            $cashbook->year = date('Y',strtotime($toDate));
            $cashbook->upto_date = $toDate;
            $cashbook->student_fee_details_id = implode(',', $StudentFeeDetailsArrId);
            $cashbook->user_id = Auth::guard('admin')->user()->id;
            $cashbook->save();
 
            //paid fee details 1
            $FeeDetail =new StudentFeeDetail();
            foreach ($StudentFeeDetails as $StudentFeeDetail) {
              $insArr = array();
              $insArr['paid']=1;
              $FeeDetail->updateArr($insArr,$StudentFeeDetail->id);  
            }
            //StudentLedger save data
            $studentLedger = new StudentLedger();
            $studentLedger->student_id = $student->id;
            $studentLedger->cashbook_id = $cashbook->id;
            $studentLedger->save();
            //StudentFee paid upto
            $StudentFeePaidUpTo = new StudentFeePaidUpTo();
            $StudentFeePaidUpTo->student_id = $student->id;
            $StudentFeePaidUpTo->cashbook_id = $cashbook->id;
            $StudentFeePaidUpTo->upto_date = $toDate;
            $StudentFeePaidUpTo->from_month = $toDate;
            $StudentFeePaidUpTo->save();

            //BalanceAmount save data
            $balanceAmounts = BalanceAmount::where('student_id',$student->id)->firstOrNew(['student_id'=>$student->id]);
            $balanceAmounts->student_id= $student->id;
            $balanceAmounts->cashbook_id = $cashbook->id;
            $balanceAmounts->receipt_no = $cashbook->receipt_no;
            $balanceAmounts->receipt_date = $cashbook->receipt_date;
            $balanceAmounts->balance_amount = $request->fee_balance;
            $balanceAmounts->save();  
            //sms send fee details
             $message = $student->name.' Fee Amount Paid '.'RS-'. $cashbook->deposit_amount;
            event(new SmsEvent($student->father_mobile,$message));
            $cashbooks[] = [$cashbook];
        }
       $BalanceAmount=$request->fee_balance;                               
        
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
