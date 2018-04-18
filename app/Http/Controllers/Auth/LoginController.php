<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; 
use App\User;
use App\Admin;

use Socialite;

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
    // use RegistersUsers;
    


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
 
    public function redirectToProvider()
    {
        // return Socialite::driver('facebook')->get();
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {

        $user = Socialite::driver('facebook')->user();

        return $user->user;
    }

    public function googleredirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function googlehandleProviderCallback()
    {
        $google = Socialite::driver('google')->stateless()->user();
        $find = User::whereEmail($google->email)->first();
        if($find){
            Auth::login($find);
         return redirect('/home');
        }else{
            $user = new User;
            $user->name = $google->name;
            $user->emai = $google->email;
            $user->password = bcrypt(123456);
            $user->save();
            Auth::login($google->email);
            return redirect('/home');
        }
    }
    
}
