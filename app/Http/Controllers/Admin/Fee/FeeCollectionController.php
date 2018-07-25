<?php

namespace App\Http\Controllers\Admin\Fee;

use App\Http\Controllers\Controller;
use App\Model\BalanceAmount;
use App\Model\Cashbook;
use App\Model\StudentDefaultValue;
use App\Model\StudentFeeDetail;
use App\Model\StudentLedger;
use App\Model\StudentSiblingInfo;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
 

class FeeCollectionController extends Controller
{
    public function index(){
    	$students = array_pluck(Student::get(['id','registration_no']), 'registration_no','id');
    	return view('admin.finance.feecollection.fee_collection_form',compact('students'));
    }

    // show main form show search stuent form
    public function show(Request $request,Student $student){ 
    	$student = Student::find($request->student_id); 
       $defultDate = StudentDefaultValue::find(1);


    	$data = view('admin.finance.feecollection.fee_collection_detail',compact('student','defultDate'))->render();
    	return response()->json($data);
    }


    // show show all fee deatial
    public function feeDetail(Request $request){
        $student = Student::find($request->student_id) ;
        $siblings = StudentSiblingInfo::where('student_id',$request->student_id)->get();

    	$StudentFeeDetails = StudentFeeDetail::where('student_id',$request->student_id)->whereMonth('from_date' , $request->month)->whereYear('from_date' , $request->year)->get(); 
    	 
    	$data = view('admin.finance.feecollection.fee_detail_show',compact('StudentFeeDetails','siblings','request','student'))->render();
    	return response()->json($data);
    }

    // store fee collection form
    public function store(Request $request){
         
        $students = $request->student_id; 
        foreach ($students as $key => $student) {
            $student = Student::find($student);
            $StudentFeeDetails = StudentFeeDetail::where('student_id',$student->id)->whereMonth('from_date' , $request->month)->whereYear('from_date' , $request->year)->get();

            $cashbook = new Cashbook();
            $cashbook->student_id = $student->id;
            $cashbook->receipt_no = date('Y').$student->id.time();
            $cashbook->receipt_date = date('Y-m-d');
            $cashbook->receipt_amount = $StudentFeeDetails->sum('fee_amount')-$StudentFeeDetails->sum('concession_amount');
            $cashbook->deposit_amount = $request->deposit_amount;
            $cashbook->balance_amount = $StudentFeeDetails->sum('fee_amount')-$StudentFeeDetails->sum('concession_amount')-$request->deposit_amount;
            $cashbook->payment_mode = $request->payment_mode;
            $cashbook->refrence_no = $request->refrence_no;
            $cashbook->payment_mode_date = $request->payment_mode_date;
            $cashbook->bank_name = $request->bank_name;
            $cashbook->on_account = 'on_account';
            $cashbook->student_name = $student->name;
            $cashbook->class = $student->classes->name;
            $cashbook->roll_no = $student->roll_no;
            $cashbook->registration_no = $student->registration_no;
            $cashbook->father_name = $student->father_name;
            $cashbook->save();

            //paid fee details 1
            foreach ($StudentFeeDetails as $StudentFeeDetail) {
               $paid=StudentFeeDetail::find($StudentFeeDetail->id); 
               $paid->paid =1;
               $paid->save(); 
            }

            //StudentLedger save data
            $studentLedger = new StudentLedger();
            $studentLedger->student_id = $student->id;
            $studentLedger->cashbook_id = $cashbook->id;
            $studentLedger->save();

            //BalanceAmount save data
            $balanceAmount = BalanceAmount::where('student_id',$student->id)->firstOrNew(['student_id'=>$student->id]);
            $balanceAmount->student_id= $student->id;
            $balanceAmount->cashbook_id = $cashbook->id;
            $balanceAmount->receipt_no = $cashbook->receipt_no;
            $balanceAmount->receipt_date = $cashbook->receipt_date;
            $balanceAmount->balance_amount = $cashbook->balance_amount;
            $balanceAmount->save(); 
        }

        return response()->json(['message'=>'Successfully','status'=>'success']);
       
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
