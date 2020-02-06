<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\FeeGroup;
use App\Model\FeeStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
    public function addForm($id=null)
    {
        if ($id!=null) {
        $feeGroups = FeeGroup::find(Crypt::decrypt($id)); 
        }
        if ($id==null) {
        $feeGroups = ''; 
        }
        return view('admin.finance.fee_group_form',compact('feeGroups'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id=null)
    {
        $rules= [ 
            'name' => 'required|max:30|unique:fee_groups,name,'.$id, 
            'description' => 'nullable|max:100', 
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }else {
            $feeGroup = FeeGroup::firstOrNew(['id'=>$id]); 
            $feeGroup->name = $request->name;
            $feeGroup->description = $request->description;
            $feeGroup->save();
            $response["status"]=1;
            $response["msg"]='Fee Group Submit Successfully';
            return response()->json($response);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\FeeGroup  $feeGroup
     * @return \Illuminate\Http\Response
     */
    public function group($id)
    {
         $feeGroups=$id;
         $feeStructures = FeeStructure::orderBy('name','ASC')->get();  
         return view('admin.finance.fee_group_collection',compact('feeGroups','feeStructures'));   
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
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\FeeGroup  $feeGroup
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
   {

       $feeGroup = FeeGroup::find(Crypt::decrypt($id)); 
       $feeGroup->delete();
       return  redirect()->back()->with(['message'=>'Fee Group Delete Successfully','class'=>'success']);
   }
}
