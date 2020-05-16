<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\FeeAccount;
use App\Model\Hr\Bank;
use App\Model\MappingBankAccount;
use App\Model\SchoolBankDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
            $feeAccounts=FeeAccount::find(Crypt::decrypt($id));
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

        $feeAccount = FeeAccount::find(Crypt::decrypt($id));
        $feeAccount->delete();
        return  redirect()->back()->with(['message'=>'Fee Account Delete Successfully','class'=>'success']);
    }

    public function bankDetails()
    {
        $SchoolBankDetails=SchoolBankDetail::orderBy('id','ASC')->get();
        return view('admin.finance.bankDetails.index',compact('SchoolBankDetails'));
    }
    public function bankDetailsAddForm()
    {
        $banks=Bank::orderBy('name','ASC')->get();
        return view('admin.finance.bankDetails.add_form',compact('banks'));
    }
    public function bankDetailsStore(Request $request,$id=null){
        $rules=[
            'bank_id' => 'required',
            'ifsc_code' => 'required',
            'account_no' => 'required',
            'account_name' => 'required',
            'contact_no' => 'required',
            'email' => 'required',
            'contact_person_name' => 'required',
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
                $SchoolBankDetail=SchoolBankDetail::firstOrNew(['id'=>$id]);
                $SchoolBankDetail->bank_id=$request->bank_id; 
                $SchoolBankDetail->ifsc_code=$request->ifsc_code; 
                $SchoolBankDetail->account_no=$request->account_no; 
                $SchoolBankDetail->account_name=$request->account_name; 
                $SchoolBankDetail->contact_no=$request->contact_no; 
                $SchoolBankDetail->email=$request->email; 
                $SchoolBankDetail->branch=$request->branch; 
                $SchoolBankDetail->bank_address=$request->bank_address; 
                $SchoolBankDetail->contact_person_name=$request->contact_person_name; 
                $SchoolBankDetail->save();
                $response=['status'=>1,'msg'=>'Submit Successfully'];
              }     return response()->json($response);
    }

    public function mappingBankAccount($value='')
    {
        $feeAccounts=FeeAccount::orderBy('name','ASC')->get();
        $SchoolBankDetail=SchoolBankDetail::orderBy('account_name','ASC')->get();
        return view('admin.finance.bankDetails.mapping',compact('feeAccounts','SchoolBankDetail'));
    }
    public function mappingBankAccountStore(Request $request ,$id=null)
    {
       $rules=[
        'fee_account' => 'required',
        'bank_account' => 'required',
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
                $SchoolBankDetail=MappingBankAccount::firstOrNew(['id'=>$id]);
                $SchoolBankDetail->fee_account_id=$request->fee_account;
                $SchoolBankDetail->school_bank_details_id=$request->bank_account; 
                $SchoolBankDetail->save();
                return $response=['status'=>1,'msg'=>'Submit Successfully'];
              }
    }
}
