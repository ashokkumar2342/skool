<?php

namespace App\Http\Controllers\Admin;

use App\Model\FeeStructure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('admin.finance.fee_structure',compact('feeStructures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        
            'code' => 'required|max:3|unique:fee_accounts', 
            'name' => 'required|max:30|unique:fee_accounts', 
            'description' => 'max:100', 
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $feeStructure = new FeeStructure();
            $feeStructure->code = $request->code;
            $feeStructure->name = $request->name;
            $feeStructure->description = $request->description;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FeeStructure  $feeStructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeStructure $feeStructure)
    {
        $feeStructure = FeeStructure::findOrFail($request->id);
        $feeStructure->delete();
        return  response()->json([$feeStructure,'message'=>'Fee Structure Delete Successfully','class'=>'success']);
    }
}
