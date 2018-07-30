<?php

namespace App\Http\Controllers\Admin\Fee;

use App\Http\Controllers\Controller;
use App\Model\Account;
use App\Model\Cashbook;
use App\Model\ClassType;
use App\Model\PaymentMode;
use App\Model\StudentDefaultValue;
use App\Model\StudentFeeDetail;
use App\Model\StudentLedger;
use App\User;
use Illuminate\Http\Request;

class CashbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cashbooks = Cashbook::get();
        $classes = array_pluck(ClassType::get(['name','alias'])->toArray(),'alias', 'name');
        $users = array_pluck(User::get(['name','id'])->toArray(),'name', 'name');
        $paymentModes = array_pluck(PaymentMode::get(['name','id'])->toArray(),'name', 'name');
        $accounts = array_pluck(Account::get(['name','id'])->toArray(),'name', 'id');
        
        $default = StudentDefaultValue::find(1); 
        return view('admin.finance.cashbook.list',compact('classes','users','paymentModes','accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function printReciept(Request $request,$id)
    {

        $cashbook = Cashbook::find($id);
         
       return view('admin.finance.cashbook.print',compact('cashbook'));
    }

    public function daterange(Request $request)
    {
         
        $date  = explode('-',$request->daterange);// dateRange is you string
        $dateFrom = date( 'Y-m-d', strtotime($date[0]));
        $dateTo = date( 'Y-m-d', strtotime($date[1])); 

        $cashbooks = Cashbook::orWhereBetween('created_at', [$dateFrom, $dateTo])
                                ->OrWhere('class',$request->class)
                                ->OrWhere('user_id',$request->user)
                                ->OrWhere('payment_mode',$request->paymentMode)
                                ->OrWhere('on_account',$request->account)
                                ->where('status',1)
                                ->get();
        $response['data'] = view('admin.finance.cashbook.daterange_result',compact('cashbooks'))->render();
        $response['status'] = 1; 
         
        return response()->json($response);
         
       // return view('admin.finance.cashbook.print',compact('cashbook'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cashbook  $cashbook
     * @return \Illuminate\Http\Response
     */
    public function cancelRecietp(Cashbook $cashbook)
    {
         // student fee details status change
      $StudentFeeDetails = StudentFeeDetail::where('student_id',$cashbook->student_id)->whereMonth('from_date' , $cashbook->month)->whereYear('from_date' , $cashbook->year)->get();
          foreach ($StudentFeeDetails as $StudentFeeDetail) {
                   $status= StudentFeeDetail::find($StudentFeeDetail->id);
                $status->paid=0;
                $status->save();
           } 
      //cashbook status change
        $cashbook->status=2;
        $cashbook->save(); 
        //student leger status change
        $studentLedger = StudentLedger::where('cashbook_id',$cashbook->id)->update(['status'=>2]);

         $response["status"]=1;
        $response["msg"]="Status Successfully";
       return response()->json($response); 
          
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cashbook  $cashbook
     * @return \Illuminate\Http\Response
     */
    public function edit(Cashbook $cashbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cashbook  $cashbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cashbook $cashbook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cashbook  $cashbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cashbook $cashbook)
    {
        //
    }
}
