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
        $parents =ParentRegistration::latest()->get();
        return view('admin.registration.formList',compact('parents'));
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
        
        return redirect()->back()->with(['class'=>'success','message'=>'Status Changed']);

    }

    public function statusReject($id)
    {

        $registrationForm = ParentRegistration::find($id);
         $registrationForm->active_status=3;
         $registrationForm->save();
        
        return redirect()->back()->with(['class'=>'success','message'=>'Status Changed']);

    }

    public function statusApproved($id)
    {

        $registrationForm = ParentRegistration::find($id);
         $registrationForm->active_status=1;
         $registrationForm->save();
        
        return redirect()->back()->with(['class'=>'success','message'=>'Status Changed']);

    }

     
}
