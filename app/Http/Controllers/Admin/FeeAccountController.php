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
        $feeAccounts = FeeAccount::orderBy('sorting_order_no','ASC')->get();
        return view('admin.finance.fee_account',compact('feeAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addForm(Request $request,$id=null)
    {
        if ($id!=null) {
            $feeAccounts=FeeAccount::find($id);
        }
        if ($id==null) {
            $feeAccounts='';
        }
       return view('admin.finance.fee_account_form',compact('feeAccounts'));  
         
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id=null)
    {
       
       $rules=[
            'code' => 'required|max:3|unique:fee_accounts,code,'.$id,
            'name' => 'required|max:50|unique:fee_accounts,name,'.$id,
            
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
            $feeAccount =FeeAccount::firstOrNew(['id'=>$id]);
            $feeAccount->code = $request->code;
            $feeAccount->name = $request->name;
            $feeAccount->description = $request->description;
            $feeAccount->sorting_order_no = $request->sorting_order_no;
            $feeAccount->save();
            $response=array();
            $response["status"]=1;
            $response["msg"]='Fee Account Create Successfully';
            return response()->json($response);  
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
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FeeAccount  $feeAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $feeAccount = FeeAccount::find($id);
        $feeAccount->delete();
        return  redirect()->back()->with(['message'=>'Fee Account Delete Successfully','class'=>'success']);
    }
}
