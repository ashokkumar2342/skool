<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\FeeStructure;
use App\Model\FeeStructureAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeeStructureAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeStructureAmounts = FeeStructureAmount::OrderBy('created_at')->paginate(20);         
        $acardemicYears = AcademicYear::all();
        $acardemicYearsSet = AcademicYear::where('status',1)->first();
        $feeStructur = array_pluck(FeeStructure::get(['id','name'])->toArray(),'name', 'id'); 
        return view('admin.finance.fee_structure_amount',compact('feeStructureAmounts','acardemicYears','feeStructur','acardemicYearsSet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function onchange(Request $request)
    {
        $academic_year_id=$request->id;
        $feeStructurs = FeeStructure::all();
        return view('admin.finance.fee_structure_amount_table',compact('academic_year_id','feeStructurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
         $rules=[
          
           'academic_year_id' => 'required', 
            'amount' => 'required',
       
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        else {
        foreach ($request->amount as $key => $value) {
           $feeStructureamount = FeeStructureAmount::firstOrNew(['academic_year_id'=>$request->academic_year_id,'fee_structure_id'=>$key]);             
            $feeStructureamount->academic_year_id = $request->academic_year_id;
            $feeStructureamount->fee_structure_id = $key;
            $feeStructureamount->amount = $value;             
            $feeStructureamount->save();   
        }
        $response=['status'=>1,'msg'=>'Created Successfully'];
            return response()->json($response);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\FeeStructureAmount  $feeStructureAmount
     * @return \Illuminate\Http\Response
     */
    public function show(FeeStructureAmount $feeStructureAmount)
    {
        //
    }
    public function search(Request $request)
    {
        $feeStructureAmount = FeeStructureAmount::where('fee_structure_id',$request->id)->first()->amount;

       return response()->json($feeStructureAmount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\FeeStructureAmount  $feeStructureAmount
     * @return \Illuminate\Http\Response
     */
    public function edit(FeeStructureAmount $feeStructureAmount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\FeeStructureAmount  $feeStructureAmount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeeStructureAmount $feeStructureAmount)
    {

        $validator = Validator::make($request->all(), [
        'academic_year_id' => 'required',    
            'fee_structure_id' => 'required',    
            'amount' => 'required|max:7',
           
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $$feeStructureAmount = $feeStructureAmount::findOrFail($request->id);
            
            $$feeStructureAmount->academic_year_id = $request->academic_year_id;
            $$feeStructureAmount->fee_structure_id = $request->fee_structure_id;
            $$feeStructureAmount->amount = $request->amount; 
            $$feeStructureAmount->save();
            return response()->json([$$feeStructureAmount,'class'=>'success','message'=>'Fee Account Updeted Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FeeStructureAmount  $feeStructureAmount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,FeeStructureAmount $feeStructureAmount)
    {
         $$feeStructureAmount = FeeStructureAmount::findOrFail($request->id);
        $$feeStructureAmount->delete();
        return  response()->json([$$feeStructureAmount,'message'=>'Fee Structure Amount Delete Successfully','class'=>'success']);
    }
}
