<?php

namespace App\Http\Middleware\Admin;

use App\Helper\MyFuncs;
use Auth;
use Closure;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (Auth::guard($guard)->check()) {         
            return redirect()->route('admin.dashboard');
        }
        if (MyFuncs::isPermission()!=true) {
           dd('User have not permission for this page access.');
        }
        return $next($request);
    }
}
