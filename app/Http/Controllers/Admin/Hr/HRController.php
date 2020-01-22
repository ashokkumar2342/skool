<?php

namespace App\Http\Controllers\Admin\Hr;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\Hr\Department;
use App\Model\Hr\Employee;
use App\Model\Hr\Experience;
use App\Model\Hr\HrGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class HRController extends Controller
{
    public function index(){ 
    	return view('admin.hr.employee.index');
    }
    public function addForm($id=null){
        $admins=Admin::orderBy('first_name','ASC')->get();  
        $Departments=Department::orderBy('name','ASC')->get();  
        $groups=HrGroup::orderBy('name','ASC')->get();  
        $experiences=Experience::orderBy('name','ASC')->get();
        if ($id!=null) {
          	$Employee=Employee::find(Crypt::decrypt($id));
          }
          if ($id==null) {
          	$Employee='';
          }  
        return view('admin.hr.employee.add_form',compact('admins','Departments','groups','experiences'));
    }
    public function store(Request $request,$id=null){return $request;
        $rules=[
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
               $employees=Employee::firstOrNew(['id'=>$id]);
                $employees->user_id=$request->user_name;
				$employees->qualification=$request->qualification;
				$employees->date_of_joining=$request->date_of_joining;
				$employees->date_of_resignation=$request->date_of_resignation;
				$employees->date_of_confirmation=$request->date_of_confirmation;
				$employees->group_id=$request->group; 
				$employees->formalities=$request->formalities;
				$employees->offer_acceptance=$request->offer_acceptance;
				$employees->probation_period=$request->probation_period;
				$employees->salary=$request->salary;
				$employees->emergency_number=$request->emergency_no;
				$employees->pan_number=$request->pan_no;
				$employees->date_of_birth=$request->dob; 
				$employees->experience=$request->experience; 
				$employees->department=$request->department; 
                $employees->save();
                $response=['status'=>1,'msg'=>'Submit Successfully'];
              }     return response()->json($response);
    }
    public function tableShow(){ 
    	$employees=Employee::all();
        return view('admin.hr.employee.table',compact('employees'));
    }
 
}
