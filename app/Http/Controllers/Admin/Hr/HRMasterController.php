<?php

namespace App\Http\Controllers\Admin\Hr;

use App\Http\Controllers\Controller;
use App\Model\Hr\Department;
use App\Model\Hr\Experience;
use App\Model\Hr\HrGroup;
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

    //------------------group----------------------------------------------------------------
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
    
}
