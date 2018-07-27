<?php

namespace App\Http\Controllers\Admin\Fee;

use App\Http\Controllers\Controller;
use App\Model\Cashbook;
use App\Model\ClassType;
use App\Model\StudentDefaultValue;
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
        $default = StudentDefaultValue::find(1); 
        return view('admin.finance.cashbook.list',compact('classes','default'));
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

        $cashbooks = Cashbook::whereBetween('created_at', [$dateFrom, $dateTo])
                                ->orWhere('class',$request->class)
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
    public function show(Cashbook $cashbook)
    {
        //
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
