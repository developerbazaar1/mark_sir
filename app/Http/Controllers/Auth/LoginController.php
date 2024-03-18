<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

     protected function authenticated(Request $request, $user)
    {   
        // if (Auth::check()) {
           
        //     // Check if the user is logged in as admin or user
        //     if (Auth::user()->userType == 'admin') {
        //         Auth::logout();
        //         return redirect()->back()->with('error', 'You are already logged in as an admin. Please log out first.');
        //     } elseif (Auth::user()->userType == 'user') {
        //         Auth::logout();
        //         return redirect()->back()->with('error', 'You are already logged in as a user. Please log out first.');
        //     }
        // }

        if ($user->access_status == 'inactive') {
            Auth::logout();
            return redirect()->back()->with('error', 'Your application has been sent for review. You will receive an email with next steps, when your application has been approved or rejected');
            
        }
    }

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

      public function redirectTo() {
        $userType = Auth::user()->userType; 

        if($userType == 'admin'){
            return '/admin/dashboard';
        }else if($userType == 'user'){
            return '/user/dashboard';
        }else{
            return '/'; 
        }
       
    }
}
