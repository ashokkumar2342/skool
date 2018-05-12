<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ClassFeeStructure;
use App\Model\ClassType;
use App\Model\FeeStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClassFeeStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        DB::table('students')->get(); 
        $classFeeStructures = ClassFeeStructure::orderBy('is_applicable','desc')->get();
        $feeStructur = array_pluck(FeeStructure::get(['id','name'])->toArray(),'name', 'id'); 
        $classess = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id'); 
        return view('admin.finance.class_fee_structure',compact('feeStructur','classess','classFeeStructures'));
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
        
            'class_id' => 'required|max:3', 
            'fee_structure_id' => 'required|max:30', 
            'is_applicable' => 'required', 
             
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $classFeeStructure = ClassFeeStructure::firstOrNew(['class_id'=>$request->class_id,'fee_structure_id'=>$request->fee_structure_id]);
            $classFeeStructure->class_id = $request->class_id;
            $classFeeStructure->fee_structure_id = $request->fee_structure_id; 
            $classFeeStructure->is_applicable = $request->is_applicable;
            $classFeeStructure->save();
            return response()->json([$classFeeStructure,'class'=>'success','message'=>'Class Fee Structure Created Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ClassFeeStructure  $classFeeStructure
     * @return \Illuminate\Http\Response
     */
    public function show(ClassFeeStructure $classFeeStructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ClassFeeStructure  $classFeeStructure
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassFeeStructure $classFeeStructure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ClassFeeStructure  $classFeeStructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassFeeStructure $classFeeStructure)
    {
        //
    }
    public function isApplicable(Request $request, ClassFeeStructure $classFeeStructure)
    {
       
         
            $classFeeStructure = ClassFeeStructure::findOrFail($request->id); 
            $data = $classFeeStructure->is_applicable == 1 ? '0' : '1';
            $classFeeStructure->is_applicable = $data;
            $classFeeStructure->save();
            return response()->json([$classFeeStructure,'class'=>'success','message'=>'Change Successfully']);
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ClassFeeStructure  $classFeeStructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,ClassFeeStructure $classFeeStructure)
    {
        $classFeeStructure = ClassFeeStructure::findOrFail($request->id);
        $classFeeStructure->delete();
        return  response()->json([$classFeeStructure,'message'=>'Class Fee Structure Delete Successfully','class'=>'success']);
    }
}
