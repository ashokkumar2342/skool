<?php

namespace App\Http\Controllers\Front;

use App\Events\SmsEvent;
use App\Http\Controllers\Controller;
use App\Model\AcademicYear;
use App\Model\BloodGroup;
use App\Model\Category;
use App\Model\ClassType;
use App\Model\Gender;
use App\Model\ParentRegistration;
use App\Model\Religion;
use App\Model\SessionDate;
use App\Model\StudentDefaultValue;
use App\Model\Tongue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class ParentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.

     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('firststep','login','resitrationForm');;

    // }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function firststep()
    {
        return view('front.registration.firststep');
    }
    public function login()
    {        
        return view('front.registration.login');
    }

    public function resitrationForm($id=null)
    {
       $pr = ParentRegistration::find(Crypt::decrypt($id));
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');    
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $genders = array_pluck(Gender::get(['id','genders'])->toArray(),'genders', 'id');
        $religions = array_pluck(Religion::get(['id','name'])->toArray(),'name', 'id');
        $categories = array_pluck(Category::get(['id','name'])->toArray(),'name', 'id');
        $tongues = array_pluck(Tongue::get(['id','name'])->toArray(),'name', 'id');
        $bloodGroups = array_pluck(BloodGroup::get(['id','name'])->toArray(),'name', 'id');
        $academicYear = array_pluck(AcademicYear::get(['id','name'])->toArray(),'name', 'id');
        $default = StudentDefaultValue::find(1); 
           
        return view('front.registration.form',compact('classes','sessions','default','genders','religions','categories','tongues','bloodGroups','academicYear','pr'));
       
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|max:199|unique:parent_registrations',             
            'mobile' => 'required|numeric|digits:10|unique:parent_registrations',             
            'password' => 'required|min:6',
            'password_confirm' => 'required_with:password|same:password|min:6'            
            ]);
        $accounts = new ParentRegistration();
        
        $accounts->email = $request->email;
        $accounts->email_otp = mt_rand(100000,999999);
        $accounts->mobile_otp = mt_rand(100000,999999);
        $accounts->password = bcrypt($request['password']);
        $accounts->mobile = $request->mobile;
       
        if ($accounts->save())
         {
            event(new SmsEvent($accounts->mobile,$accounts->mobile_otp));
            $data = array( 'email' => $accounts->email, 'otp' => $accounts->email_otp, 'from' => 'school@iskool.com', 'from_name' => 'school' );

            Mail::send( 'mail', $data, function( $message ) use ($data)
            {
                $message->to( $data['email'] )->from( $data['from'], $data['otp'] )->subject( 'Otp Verification!' );
            });

          return redirect()->route('student.resitration.verification',Crypt::encrypt($accounts->id))->with(['message'=>'Account created Successfully.','class'=>'success']);        
        }
        else{
            return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ParentRegistration  $parentRegistration
     * @return \Illuminate\Http\Response
     */
    public function verification($id)
    {
       $parentRegistration= ParentRegistration::find(Crypt::decrypt($id));
         return view('front.registration.verification',compact('parentRegistration'));
    }

    public function verifyMobile(Request $request)
    {
        $this->validate($request,[
                      
            'mobile_otp' => 'required|numeric',  
            ]);
         
        $parentRegistration= ParentRegistration::where('mobile',$request->mobile)
                                                    ->where('mobile_otp',$request->mobile_otp)
                                                    ->first();
        if ($parentRegistration==null) {
            return redirect()->back()->with(['class'=>'error','message'=>'Mobile Otp Not Match']);      
        }else{
             $parentRegistration->mobile_verify=1;                                        
             $parentRegistration->save() ;
             if ($parentRegistration->email_verify==1 && $parentRegistration->mobile_verify==1) {
               return redirect()->route('parent.login.form')->with(['class'=>'success','message'=>'Mobile Otp Verify']);  
            }else{
             return redirect()->back()->with(['class'=>'success','message'=>'Mobile Otp Verify']);
            }

        }
                                           
             
             
        
        
        // return redirect()->back()->with(['class'=>'success','message'=>'Email Otp Verify']);
        

    }
    public function verifyEmail(Request $request)
    {

       $this->validate($request,[
                     
           'email_otp' => 'required|numeric',  
           ]);
        
       $parentRegistration= ParentRegistration::where('email',$request->email)
                                                   ->where('email_otp',$request->email_otp)
                                                   ->first();
       if ($parentRegistration==null) {
           return redirect()->back()->with(['class'=>'error','message'=>'Email Otp Not Match']);      
       }else{
            $parentRegistration->email_verify=1;                                        
            $parentRegistration->save() ;
            if ($parentRegistration->email_verify==1 && $parentRegistration->mobile_verify==1) {
               return redirect()->route('parent.login.form')->with(['class'=>'success','message'=>'Email Otp Verify']);  
            }else{
               return redirect()->back()->with(['class'=>'success','message'=>'Email Otp Verify']); 
            }
            

       }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParentRegistration  $parentRegistration
     * @return \Illuminate\Http\Response
     */
    public function student(Request $request)
    { 
      
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]);
        $parentRegistration->parent_id=Auth::user()->id;
        $parentRegistration->aadhaar_no=$request->aadhaar_no;
        $parentRegistration->academic_year_id=$request->academic_year;
        $parentRegistration->blood_group=$request->blood_group;
        $parentRegistration->category_id=$request->category;
        $parentRegistration->class_id=$request->class;
        $parentRegistration->dob=$request->dob == null ? $request->dob : date('Y-m-d',strtotime($request->dob)); 
        $parentRegistration->email=$request->email;
        $parentRegistration->name=$request->first_name;
        $parentRegistration->gender_id=$request->gender;
        $parentRegistration->last_name=$request->last_name;
        $parentRegistration->locality=$request->locality;
        $parentRegistration->nick_name=$request->nick_name;
        $parentRegistration->religion_id=$request->religion;
        $parentRegistration->staff_ward=$request->staff_ward;
        $parentRegistration->tongue=$request->tongue;
        $parentRegistration->mobile=$request->mobile;
        
        $parentRegistration->save();
         $response=['status'=>1,'msg'=>'Save Success'];
        return response()->json($response); 


    }

    public function previousSchool(Request $request)
    {     
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        $parentRegistration->last_school=$request->last_school;
        $parentRegistration->leaving_date=$request->leaving_date;
        $parentRegistration->reason_change_school=$request->reason_change_school; 
        $parentRegistration->save();
         $response=['status'=>1,'msg'=>'Save Success'];
        return response()->json($response);  
    }

     public function address(Request $request)
    {    
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]);
        $parentRegistration->c_address=$request->c_address; 
        $parentRegistration->pincode=$request->pincode; 
        $parentRegistration->phone=$request->phone; 
        $parentRegistration->p_address=$request->p_address; 
        $parentRegistration->p_pincode=$request->p_pincode; 
        $parentRegistration->p_phone=$request->p_phone; 

        $parentRegistration->save();
        $response=['status'=>1,'msg'=>'Save Success'];
        return response()->json($response);  
    }

     public function father(Request $request)
    {       
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        $parentRegistration->save();
        return redirect()->back()->with(['class'=>'success','message'=>'Success']);  
    }

     public function mother(Request $request)
    {       
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        $parentRegistration->save();
        return redirect()->back()->with(['class'=>'success','message'=>'Success']);  
    }

     public function guardian(Request $request)
    {       
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        $parentRegistration->save();
        return redirect()->back()->with(['class'=>'success','message'=>'Success']);  
    }

     public function sibling(Request $request)
    {       
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        $parentRegistration->save();
        return redirect()->back()->with(['class'=>'success','message'=>'Success']);  
    }

     public function career(Request $request)
    {       
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        $parentRegistration->save();
        return redirect()->back()->with(['class'=>'success','message'=>'Success']);  
    }

     public function other(Request $request)
    {       
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        $parentRegistration->save();
        return redirect()->back()->with(['class'=>'success','message'=>'Success']);  
    }

     public function declaration(Request $request)
    {       
        $parentRegistration = ParentRegistration::firstOrNew(['parent_id'=>Auth::user()->id]); 
        $parentRegistration->save();
        return redirect()->back()->with(['class'=>'success','message'=>'Success']);  
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParentRegistration  $parentRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParentRegistration $parentRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParentRegistration  $parentRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParentRegistration $parentRegistration)
    {
        //
    }
}
