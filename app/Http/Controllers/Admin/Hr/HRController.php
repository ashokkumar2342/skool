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
        return view('admin.hr.employee.add_form',compact('admins','Departments','groups','experiences','Employee'));
    }
    public function store(Request $request,$id=null){
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
				$employees->gender_id=$request->gender_id; 
        $employees->group_id=$request->group; 
				$employees->formalities=$request->formalities;
				$employees->offer_acceptance=$request->offer_acceptance;
				$employees->probation_period=$request->probation_period;
        $employees->notice_period=$request->notice_period;
				$employees->salary=$request->salary;
				$employees->emergency_number=$request->emergency_no;
				$employees->pan_number=$request->pan_no;
				$employees->experience=$request->experience; 
				$employees->department_id=$request->department; 
        $employees->account_number=$request->account_number; 
        $employees->bank_name=$request->bank_name; 
        $employees->ifsc_code=$request->ifsc_code; 
        $employees->bank_name=$request->bank_name; 
        $employees->pf_account_number=$request->pf_account_number; 
        $employees->un_number=$request->un_number; 
				$employees->father_name=$request->father_name; 
        $employees->current_address=$request->current_address; 
        $employees->permanent_address=$request->permanent_address; 
                $employees->save();
                $response=['status'=>1,'msg'=>'Submit Successfully'];
              }     return response()->json($response);
    }
    public function tableShow(){ 
    	$employees=Employee::all();
        return view('admin.hr.employee.table',compact('employees'));
    }
    public function destroy($id){ 
      $Employee=Employee::find(Crypt::decrypt($id));
      $Employee->delete();
      $response=['status'=>1,'msg'=>'Delete Successfully'];
     return response()->json($response);
    }
 
}
