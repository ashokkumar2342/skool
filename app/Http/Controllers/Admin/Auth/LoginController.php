<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Student;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest')->except('logout');
        $this->middleware('student.guest');
    }

    public function index(){
        return redirect()->route('admin.login');
        
    }
    
    
    public function showLoginForm(){
        return view('admin.auth.login');
    }
    public function login(Request $request){ 
     
          $this->validate($request, [
              'email' => 'required', 
              'password' => 'required', 
          ]);
          $credentials = [
                     'email' => $request['email'],
                     'password' => $request['password'],
                     'status' => 1,
                 ]; 
            if(auth()->guard('admin')->attempt($credentials)) {
                if (Auth::guard('admin')->user()->user_type==1) {
                    return redirect()->route('admin.dashboard');
                }else{
                    return redirect()->route('admin.dashboard');
                }
                   
            } 

            $student = Student::orWhere('email',$request->email)->orWhere('username',$request->email)->orWhere('father_mobile',$request->email)->first();
             if (!empty($student)) {
                 if (Hash::check($request->password, $student->password)) {
                     auth()->guard('student')->loginUsingId($student->id);
                     return redirect()->route('student.dashboard');

                 } else {
                     return Redirect()->back()->with(['message'=>'Invalid User or Password','class'=>'error']);
                 }
             }
            
            // if (auth()->guard('student')->attempt($credentials)) {
            //   return redirect()->route('student.dashboard');
            // }
            return Redirect()->back()->with(['message'=>'Invalid User or Password','class'=>'error']); 
        
       
    }
    // protected function credentials(Request $request)
    // {
    //     // return $request->only($this->username(), 'password');
    //     return ['email'=>$request->{$this->username()},'password'=>$request->password,'status'=>'1'];
    // }
  

    // Logout method with guard logout for admin only
 public function logout()
    {
        $this->guard()->logout();
        return redirect()->route('admin.login');
    }
    
    // defining auth  guard
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
