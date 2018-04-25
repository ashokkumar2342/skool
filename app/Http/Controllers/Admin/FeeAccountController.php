<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\FeeAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeeAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeAccounts = FeeAccount::latest('created_at')->paginate(20);
        return view('admin.finance.fee_account',compact('feeAccounts'));
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
            $feeAccount = new FeeAccount();
            $feeAccount->code = $request->code;
            $feeAccount->name = $request->name;
            $feeAccount->description = $request->description;
            $feeAccount->save();
            return response()->json([$feeAccount,'class'=>'success','message'=>'Fee Account Created Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\FeeAccount  $feeAccount
     * @return \Illuminate\Http\Response
     */
    public function show(FeeAccount $feeAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\FeeAccount  $feeAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(FeeAccount $feeAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\FeeAccount  $feeAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeeAccount $feeAccount)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
        
            'code' => 'required|max:3', 
            // 'name' => 'required|max:30|unique:fee_accounts', 
            // 'description' => 'max:100', 
              
        ]);
        if ($validator->fails()) {                    
             return response()->json(['errors'=>$validator->errors()->all(),'class'=>'error']); 

        } else {
            $feeAccount =  FeeAccount::find($request->id);
            // return $feeAccount;
            $feeAccount->code = $request->code;
            $feeAccount->name = $request->name;
            $feeAccount->description = $request->description;
            $feeAccount->save();
            return response()->json([$feeAccount,'class'=>'success','message'=>'Fee Account Created Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FeeAccount  $feeAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $feeAccount = FeeAccount::findOrFail($request->id);
        $feeAccount->delete();
        return  response()->json([$feeAccount,'message'=>'Fee Account Delete Successfully','class'=>'success']);
    }
}
