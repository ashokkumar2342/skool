<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Auth;
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
            return Redirect()->back()->withErrors($error="Invalid User or Password"); 
        
       
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
