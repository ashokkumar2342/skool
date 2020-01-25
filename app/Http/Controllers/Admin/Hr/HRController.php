<?php

namespace App\Http\Controllers\Admin\Hr;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\Gender;
use App\Model\Hr\Department;
use App\Model\Hr\Designation;
use App\Model\Hr\Employee;
use App\Model\Hr\EmployeeSalary;
use App\Model\Hr\Experience;
use App\Model\Hr\HrGroup;
use App\Model\Hr\Payhead;
use App\Model\Hr\SalarySetting;
use App\Model\Role;
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
        $admins=Role::orderBy('name','ASC')->get();  
        $Departments=Department::orderBy('name','ASC')->get();  
        $Designations=Designation::orderBy('name','ASC')->get();  
        $groups=HrGroup::orderBy('name','ASC')->get();  
        $experiences=Experience::orderBy('name','ASC')->get();
        $genders=Gender::orderBy('genders','ASC')->get();
        if ($id!=null) {
          	$Employee=Employee::find(Crypt::decrypt($id));
          }
          if ($id==null) {
          	$Employee='';
          }  
        return view('admin.hr.employee.add_form',compact('admins','Departments','groups','experiences','Employee','Designations','genders'));
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
                $employees->code=$request->employee_code;
				$employees->date_of_joining=$request->date_of_joining;
				$employees->department_id=$request->department; 
                $employees->designation_id=$request->designation; 
                $employees->group_id=$request->group; 
				$employees->qualification=$request->qualification;
				$employees->experience_id=$request->experience; 
                $employees->role_id=$request->role;
                $employees->name=$request->name;
                $employees->Last_name=$request->Last_name;
                $employees->date_of_birth=$request->dob;
				$employees->gender_id=$request->gender; 
                $employees->aadhaar_no=$request->aadhaar_no;
				$employees->pan_number=$request->pan_no;
                $employees->pf_account_number=$request->pf_account_number; 
                $employees->esi=$request->esi; 
                $employees->mobile_no=$request->mobile_no; 
                $employees->contact_no=$request->contact_no; 
                $employees->email=$request->email; 
                $employees->country=$request->country; 
                $employees->state=$request->state; 
                $employees->city=$request->city; 
                $employees->pincode=$request->pincode; 
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


    public function salarySettings($value='')
    {
     $salarySettings=SalarySetting::all();   
     return view('admin.hr.employee.salary_settings',compact('salarySettings'));   
    }
    public function salarySettingsAddForm($id=null)
    {
        $Designations=Designation::orderBy('name','ASC')->get();
        $employees=Employee::all();  
        $Payheads=Payhead::orderBy('name','ASC')->get();  
        if ($id!=null) {
            $salarySettings=SalarySetting::find(Crypt::decrypt($id));  
          }
          if ($id==null) {
            $salarySettings='';  
          }  
       return view('admin.hr.employee.salary_settings_add',compact('salarySettings','Designations','Payheads','employees'));  
    }
    public function salarySettingsstore(Request $request,$id=null){
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
                $employees=SalarySetting::firstOrNew(['id'=>$id]);
                $employees->designation_id=$request->designation;
                $employees->employee_id=$request->employee;
                $employees->pay_head_type_id=$request->pay_head_type; 
                $employees->unit=$request->unit; 
                $employees->type=$request->type; 
                $employees->save();
                $response=['status'=>1,'msg'=>'Submit Successfully'];
              }     return response()->json($response);
    }


    public function employeeSalary($value='')
    {
       return view('admin.hr.employee.employee_salary',compact('salarySettings','Designations','Payheads','employees'));    
    }
    public function employeeSalaryAddForm($id=null)
    {
        $Designations=Designation::orderBy('name','ASC')->get();
        $employees=Employee::all();  
        $Payheads=Payhead::orderBy('name','ASC')->get();  
        if ($id!=null) {
            $employeeSalary=EmployeeSalary::find(Crypt::decrypt($id));  
          }
          if ($id==null) {
            $employeeSalary='';  
          }  
       return view('admin.hr.employee.employee_salary_add',compact('employeeSalary','Designations','Payheads','employees'));  
    }
 
}
