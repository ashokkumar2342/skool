<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\FeeAccount;
use App\Model\FeeStructure;
use App\Model\FineScheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeeStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeStructures = FeeStructure::latest('created_at')->paginate(20);         
        $fineScheme = array_pluck(FineScheme::get(['id','name'])->toArray(),'name', 'id');
        $feeAccount = array_pluck(FeeAccount::get(['id','name'])->toArray(),'name', 'id');
     
        return view('admin.finance.fee_structure',compact('feeStructures','fineScheme','feeAccount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function amount(Request $request)
    {
            
         $feeStructures = FeeStructure::where('id',$request->id)->join('class_types','class_types.id','=','class_fees.class_id')->get(['class_types.id','class_types.name','class_types.alias']);
        return response()->json($classFee); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
        
            'code' => 'required|max:3|unique:fee_structures', 
            'name' => 'required|max:30|unique:fee_structures', 
             
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $feeStructure = new FeeStructure();
            $feeStructure->code = $request->code;
            $feeStructure->name = $request->name;
            $feeStructure->fee_account_id = $request->fee_account_id;
            $feeStructure->fine_scheme_id = $request->fine_scheme_id;
            $feeStructure->is_refundable = $request->is_refundable;
            $feeStructure->save();
            return response()->json([$feeStructure,'class'=>'success','message'=>'Fee Account Created Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\FeeStructure  $feeStructure
     * @return \Illuminate\Http\Response
     */
    public function show(FeeStructure $feeStructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\FeeStructure  $feeStructure
     * @return \Illuminate\Http\Response
     */
    public function edit(FeeStructure $feeStructure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\FeeStructure  $feeStructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeeStructure $feeStructure)
    {
        $validator = Validator::make($request->all(), [
        
            'code' => 'required|max:3', 
            'name' => 'required|max:30', 
             
             
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $feeStructure = FeeStructure::findOrFail($request->id);
            $feeStructure->code = $request->code;
            $feeStructure->name = $request->name;
            $feeStructure->fee_account_id = $request->fee_account;
            $feeStructure->fine_scheme_id = $request->fine_scheme;
            $feeStructure->is_refundable = $request->is_refundable;
            $feeStructure->save();
            return response()->json([$feeStructure,'class'=>'success','message'=>'Fee Account Created Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FeeStructure  $feeStructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeStructure $feeStructure,Request $request)
    {
        $feeStructure = FeeStructure::findOrFail($request->id);
        $feeStructure->delete();
        return  response()->json([$feeStructure,'message'=>'Fee Structure Delete Successfully','class'=>'success']);
    }
}
