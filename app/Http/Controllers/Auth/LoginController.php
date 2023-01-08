<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    // protected $redirectTo = RouteServiceProvider::HOME; // commented part
    //  normal user goes to home page and admin goes to admin dashboard
    public function authenticated(){
        if(Auth::user()->role_as == '1')
        {
            return redirect('admin/dashboard')->with('status', 'Welcome to Admin Dashboard');

        }
        else if(Auth::user()->role_as == '0') // 0= normal user
        {
            return redirect('home')->with('status', 'Logged In Successfully');


        }
        else
        {
            return redirect('/');


        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
