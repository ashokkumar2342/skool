<?php

namespace App\Http\Controllers\Admin\Registration;
 

use App\Events\SmsEvent;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\BloodGroup;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\Gender;
use App\Model\ParentRegistration;
use App\Model\RegSibling;
use App\Model\Religion;
use App\Model\SessionDate;
use App\Model\StudentDefaultValue;
use App\Model\Tongue;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Validator;

class RegistrationController extends Controller
{
    
    
    public function index()
    {
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');    
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        $bloodgroups = array_pluck(BloodGroup::get(['id','name'])->toArray(),'name', 'id');
         $acardemicYear = array_pluck(AcademicYear::get(['id','name'])->toArray(), 'name', 'id');
        $parents =ParentRegistration::latest()->get();
        return view('admin.registration.formList',compact('parents','classes','sessions','default','genders','religions','categories','bloodgroups','acardemicYear'));
    }

    public function remarkAdd(Request $request)
    {   
        $registrationForm = ParentRegistration::find($request->parent_id);
        $registrationForm->remarks=$request->remark;
        $registrationForm->save();
        return response()->json(['class'=>'success','message'=>'Add Remark Successfully']);

    }

      public function remarkShow(Request $request)
    {

        $registrationForm = ParentRegistration::where('id',$request->id)->get(['remarks']);
        
        return response()->json($registrationForm);

    }
   

    public function statusCancel($id)
    {

        $registrationForm = ParentRegistration::find($id);
         $registrationForm->active_status=2;
         $registrationForm->save();
         $response =array();
         $response['status'] = 1;
         $response['msg'] = 'Status Changed';
        return $response;
        
        

    }

    public function statusReject($id)
    {

        $registrationForm = ParentRegistration::find($id);
         $registrationForm->active_status=3;
         $registrationForm->save();
        $response =array();
        $data['status'] = 1;
         $data['msg'] = 'Status Changed';
        return $data;

    }

    public function statusApproved($id)
    {

        $registrationForm = ParentRegistration::find($id);
         $registrationForm->active_status=1;
         $registrationForm->save();
        $response =array();
         $response['status'] = 1;
         $response['msg'] = 'Status Changed';
        return $response;

    }

    public function report(Request $request){
       
        if ($request->report_for == 1) {
           $results = ParentRegistration::where('academic_year_id',$request->academic_year_id)
                    ->where('class_id',$request->class)
                    ->get();
           return  $this->responseResult($results);
        }
             
        elseif ($request->report_for == 2 ){       
            $results = ParentRegistration::where('academic_year_id',$request->academic_year_id)->where('category_id',$request->category)->get();
                   return  $this->responseResult($results);
        }
         
        elseif ($request->report_for == 3){   
            $results = ParentRegistration::where('academic_year_id',$request->academic_year_id)->where('religion_id',$request->religion)->get();
                   return  $this->responseResult($results);
        }
        
        elseif ($request->report_for == 4){       
            $results = ParentRegistration::where('academic_year_id',$request->academic_year_id)->where('gender_id',$request->gender)->get();
                   return  $this->responseResult($results);
        }
        elseif ($request->report_for == 5){ 
            $results = ParentRegistration::where('academic_year_id',$request->academic_year_id)->where('f_annual_income',$request->incomeSlab)->get();
                   return  $this->responseResult($results);
             
        } elseif ($request->report_for == 6 ){ 
            $results = ParentRegistration::where('academic_year_id',$request->academic_year_id)->where('f_occupation',$request->profession)->get();
           return  $this->responseResult($results);
             
        } elseif ($request->report_for == 7 &&  $request->school_class == 2){ 
            $results = ParentRegistration::where(['class_id'=>$request->class,'section_id'=>$request->section])->get();
                    return  $this->responseResult($results);
             
        }

         else{
            return redirect()->route('admin.student.report');
         }
    }

    public function responseResult($parents){
        $response =array();
            $response['data']= view('admin.registration.result',compact('parents'))->render();
            $response['status'] = 1;
            return $response;
    }

     
}
