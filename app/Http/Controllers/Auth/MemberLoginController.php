<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Auth;
use URL;

class MemberLoginController extends Controller
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

    protected $maxAttempts = 4;
    protected $decayMinutes = 1
    ;
    public function __construct()
    {
           $this->middleware('guest:account')->except('logout');
    }
 
    public function loginMember(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required',
        'password' => 'required|min:6'
      ]);

    if ($this->hasTooManyLoginAttempts($request)) {
        // to many attempts
        if ( $request->ajax() )
        {
             return response()->json([
              'status'=>'Limit',
              'intended' => URL::previous()
            ]);
        }

        return $this->sendLockoutResponse($request);
    }
      // Attempt to log the user in
      if (Auth::guard('account')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
		   if ($request->ajax()) {
		        return response()->json([
		        	'status'=>'Success',
		          'intended' => URL::previous()
		        ]);
		    } 
		        return redirect()->intended(URL::route('home'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      if ($request->ajax()) {
            return response()->json([
              'status'=>'Failed',
              'message'=>'Akun tidak ditemukan',
              'intended' => URL::previous()
            ]);
        } 
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::guard('account')->logout();
        return redirect()->route('home');
    }
}
