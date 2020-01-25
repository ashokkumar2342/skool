<?php

namespace App\Http\Controllers\Admin\Hr;

use App\Http\Controllers\Controller;
use App\Model\Hr\Bank;
use App\Model\Hr\Department;
use App\Model\Hr\Designation;
use App\Model\Hr\Experience;
use App\Model\Hr\HrGroup;
use App\Model\Hr\Payhead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class HRMasterController extends Controller
{
    public function index(){
        $departments=Department::orderBy('name','ASC')->get();   
    	return view('admin.hr.master.department',compact('departments'));
    }
    public function addForm($id=null){

        if ($id!=null) {
        	$departments=Department::find(Crypt::decrypt($id));  
        }
        if ($id==null) {
        	$departments='';  
        }
        return view('admin.hr.master.department_add',compact('departments'));
    }
    public function store(Request $request,$id=null){
       $rules=[
              
                'department_name' => 'required|unique:departments,name,'.$id, 
                'department_code' => 'required|unique:departments,code,'.$id, 
                
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
               $departments=Department::firstOrNew(['id'=>$id]);  
               $departments->name=$request->department_name;  
               $departments->code=$request->department_code; 
               $departments->description=$request->description; 
               $departments->save();
                $response=['status'=>1,'msg'=>'Submit Successfully'];
              }     return response()->json($response);
    }
    public function delete($id)
    {
    	$departments=Department::find(Crypt::decrypt($id));
    	$departments->delete();
    	return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
//------------------group----------------------------------------------------------------
    public function group(){
        $hrGropus=HrGroup::orderBy('name','ASC')->get();   
    	return view('admin.hr.master.group',compact('hrGropus'));
    }
    public function groupAddForm($id=null){

        if ($id!=null) {
        	$hrGroup=HrGroup::find(Crypt::decrypt($id));  
        }
        if ($id==null) {
        	$hrGroup='';  
        }
        return view('admin.hr.master.group_add',compact('hrGroup'));
    }
    public function groupStore(Request $request,$id=null){
       $rules=[
              
                'group_name' => 'required|unique:hr_groups,name,'.$id, 
                'group_code' => 'required|unique:hr_groups,code,'.$id, 
                
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
               $hrGroup=HrGroup::firstOrNew(['id'=>$id]);  
               $hrGroup->name=$request->group_name;  
               $hrGroup->code=$request->group_code; 
               $hrGroup->description=$request->description; 
               $hrGroup->save();
                $response=['status'=>1,'msg'=>'Submit Successfully'];
              }     return response()->json($response);
    }
    public function groupDelete($id)
    {
    	$hrGroup=HrGroup::find(Crypt::decrypt($id));
    	$hrGroup->delete();
    	return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }

    //------------------experience----------------------------------------------------------------
    public function experience(){
        $experiences=Experience::orderBy('name','ASC')->get();   
    	return view('admin.hr.master.exp',compact('experiences'));
    }
    public function experienceAddForm($id=null){

        if ($id!=null) {
        	$experience=Experience::find(Crypt::decrypt($id));  
        }
        if ($id==null) {
        	$experience='';  
        }
        return view('admin.hr.master.exp_add',compact('hrGroup'));
    }
    public function experienceStore(Request $request,$id=null){
       $rules=[
              
                'experience_name' => 'required|unique:experiences,name,'.$id, 
                'experience_code' => 'required|unique:experiences,code,'.$id, 
                
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
               $experience=Experience::firstOrNew(['id'=>$id]);  
               $experience->name=$request->experience_name;  
               $experience->code=$request->experience_code; 
               $experience->description=$request->description; 
               $experience->save();
                $response=['status'=>1,'msg'=>'Submit Successfully'];
              }     return response()->json($response);
    }
    public function experienceDelete($id)
    {
    	$experience=Experience::find(Crypt::decrypt($id));
    	$experience->delete();
    	return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }

    //------------------experience----------------------------------------------------------------
    public function designation(){
        $designations=Designation::orderBy('name','ASC')->get();   
        return view('admin.hr.master.designation',compact('designations'));
    }
    public function designationAddForm($id=null){

        if ($id!=null) {
            $designation=Designation::find(Crypt::decrypt($id));  
        }
        if ($id==null) {
            $designation='';  
        }
        return view('admin.hr.master.designation_add',compact('designation'));
    }
    public function designationStore(Request $request,$id=null){
       $rules=[
              
                'designation_name' => 'required|unique:designations,name,'.$id, 
                'designation_code' => 'required|unique:designations,code,'.$id, 
                
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
               $designation=Designation::firstOrNew(['id'=>$id]);  
               $designation->name=$request->designation_name;  
               $designation->code=$request->designation_code; 
               $designation->save();
                $response=['status'=>1,'msg'=>'Submit Successfully'];
              }     return response()->json($response);
    }
    public function designationDelete($id)
    {
        $designation=Designation::find(Crypt::decrypt($id));
        $designation->delete();
        return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }

    //------------------payhead----------------------------------------------------------------
    public function payhead(){
        $payheads=Payhead::orderBy('name','ASC')->get();   
        return view('admin.hr.master.pay_head',compact('payheads'));
    }
    public function payheadAddForm($id=null){

        if ($id!=null) {
            $payhead=Payhead::find(Crypt::decrypt($id));  
        }
        if ($id==null) {
            $payhead='';  
        }
        return view('admin.hr.master.pay_head_add',compact('payhead'));
    }
    public function payheadStore(Request $request,$id=null){
       $rules=[
              
                'Pay_head_type' => 'required|unique:payheads,name,'.$id, 
                'code' => 'required|unique:payheads,code,'.$id, 
                
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
               $designation=Payhead::firstOrNew(['id'=>$id]);  
               $designation->name=$request->Pay_head_type;  
               $designation->code=$request->code; 
               $designation->status=$request->addition_deduction; 
               $designation->save();
                $response=['status'=>1,'msg'=>'Submit Successfully'];
              }     return response()->json($response);
    }
    public function payheadDelete($id)
    {
        $designation=Payhead::find(Crypt::decrypt($id));
        $designation->delete();
        return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }

    //------------------bank----------------------------------------------------------------
    public function bank(){
        $Banks=Bank::orderBy('name','ASC')->get();   
        return view('admin.hr.master.bank',compact('Banks'));
    }
    public function bankAddForm($id=null){

        if ($id!=null) {
            $Bank=Bank::find(Crypt::decrypt($id));  
        }
        if ($id==null) {
            $Bank='';  
        }
        return view('admin.hr.master.bank_add',compact('Bank'));
    }
    public function bankStore(Request $request,$id=null){
       $rules=[
              
                'bank_name' => 'required|unique:banks,name,'.$id, 
                'bank_code' => 'required|unique:banks,code,'.$id, 
                
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
               $designation=Bank::firstOrNew(['id'=>$id]);  
               $designation->name=$request->bank_name;  
               $designation->code=$request->bank_code; 
               $designation->save();
                $response=['status'=>1,'msg'=>'Submit Successfully'];
              }     return response()->json($response);
    }
    public function bankDelete($id)
    {
        $designation=Bank::find(Crypt::decrypt($id));
        $designation->delete();
        return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);
    }
    
}
