<?php

namespace App\Http\Controllers\Admin\Fee;

use App\Http\Controllers\Controller;
use App\Model\ClassType;
use App\Model\StudentFeeDetail;
use Illuminate\Http\Request;

class FeeDueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = array_pluck(ClassType::get(['name','alias'])->toArray(),'alias', 'name');
          
        return view('admin.finance.feedue.list',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function filter(Request $request)
   {
     
       $date  = explode('-',$request->daterange);// dateRange is you string
       $dateFrom = date( 'Y-m-d', strtotime($date[0]));
       $dateTo = date( 'Y-m-d', strtotime($date[1])); 

       $feeDues = StudentFeeDetail::orWhereBetween('last_date', [$dateFrom, $dateTo])
                               // ->OrWhere('class',$request->class)
                             
                               // ->OrWhere('on_account',$request->account)
                               ->where('paid',0)
                               ->get();
                               
       $response['data'] = view('admin.finance.feedue.result',compact('feeDues'))->render();
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
     * @param  \App\Model\StudentFeeDetail  $studentFeeDetail
     * @return \Illuminate\Http\Response
     */
    public function show(StudentFeeDetail $studentFeeDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentFeeDetail  $studentFeeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentFeeDetail $studentFeeDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentFeeDetail  $studentFeeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentFeeDetail $studentFeeDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentFeeDetail  $studentFeeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentFeeDetail $studentFeeDetail)
    {
        //
    }
}
