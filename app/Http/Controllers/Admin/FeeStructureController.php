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
    public function addForm($id=null)
    {
        if ($id!=null) {
          $feeStructures = FeeStructure::find($id);       
            
        }if ($id==null) {
          $feeStructures = '';       
            
        }
        $fineScheme = array_pluck(FineScheme::get(['id','name'])->toArray(),'name', 'id');
        $feeAccount = array_pluck(FeeAccount::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.finance.fee_structure_form',compact('feeStructures','fineScheme','feeAccount')); 
    }

   
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
    public function store(Request $request,$id=null)
    {

        $rules=[
        
            'code' => 'required|max:3|unique:fee_structures,code,'.$id, 
            'fee_structure_name' => 'required|max:30|unique:fee_structures,name,'.$id, 
            'fee_account' => 'required', 
            'fine_scheme' => 'required', 
            'is_refundable' => 'required', 
             
              
        ];
       
          $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
           
        } else {
            $feeStructure =FeeStructure::firstOrNew(['id'=>$id]);
            $feeStructure->code = $request->code;
            $feeStructure->name = $request->fee_structure_name;
            $feeStructure->fee_account_id = $request->fee_account;
            $feeStructure->fine_scheme_id = $request->fine_scheme;
            $feeStructure->is_refundable = $request->is_refundable;
            $feeStructure->save();
            $response["status"]=1;
            $response["msg"]='Fee Structure Submit Successfully';
            return response()->json($response);
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
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FeeStructure  $feeStructure
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feeStructure = FeeStructure::find($id);
        $feeStructure->delete();
        return  redirect()->back()->with(['message'=>'Fee Structure Delete Successfully','class'=>'success']);
    }
}
