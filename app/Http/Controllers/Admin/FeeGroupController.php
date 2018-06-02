<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\FeeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeGroups = FeeGroup::latest('created_at')->paginate(20);
        return view('admin.finance.fee_group',compact('feeGroups'));
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
        
            
            'name' => 'required|max:30|unique:fee_groups', 
            'description' => 'max:100', 
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $feeGroup = new FeeGroup();
          
            $feeGroup->name = $request->name;
            $feeGroup->description = $request->description;
            $feeGroup->save();
            return response()->json([$feeGroup,'class'=>'success','message'=>'Fee Group Created Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\FeeGroup  $feeGroup
     * @return \Illuminate\Http\Response
     */
    public function show(FeeGroup $feeGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\FeeGroup  $feeGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(FeeGroup $feeGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\FeeGroup  $feeGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeeGroup $feeGroup)
    {
        $validator = Validator::make($request->all(), [
        
            
            'name' => 'required|max:30|unique:fee_groups', 
            'description' => 'max:100', 
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $feeGroup =  FeeGroup::find($request->id);
            
            $feeGroup->name = $request->name;
            $feeGroup->description = $request->description;
            $feeGroup->save();
            return response()->json([$feeGroup,'class'=>'success','message'=>'Fee Group Created Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FeeGroup  $feeGroup
     * @return \Illuminate\Http\Response
     */
   public function destroy(Request $request)
   {

       $feeGroup = FeeGroup::findOrFail($request->id);
       $feeGroup->delete();
       return  response()->json([$feeGroup,'message'=>'Fee Group Delete Successfully','class'=>'success']);
   }
}
