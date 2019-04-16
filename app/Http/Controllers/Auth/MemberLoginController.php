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

    protected $maxAttempts = 3;
    protected $decayMinutes = 1;


    public function __construct()
    {
           $this->middleware('guest:account')->except('logout');
    }
    /**
     * Check either username or email.
     * @return string
     */
    public function username()
    {
        $identity  = request()->get('identity');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'id';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
    }

        /**
     * Determine if the user has too many failed login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function hasTooManyLoginAttempts(Request $request)
    {
      $attempts = 2;
      $lockoutMinites = 1;
      return $this->limiter()->tooManyAttempts(
          $this->throttleKey($request), $attempts, $lockoutMinites
      );
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

    $field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'id';
    $request->merge([$field => $request->email]);
    
      // Attempt to log the user in
      if (Auth::guard('account')->attempt($request->only($field, 'password'))) {
        // if successful, then redirect to their intended location
         $this->clearLoginAttempts($request);
		   if ($request->ajax()) {
		        return response()->json([
		        	'status'=>'Success',
		          'intended' => URL::previous()
		        ]);
		    } 
		        return redirect()->intended(URL::route('home'));
      }
      $this->incrementLoginAttempts($request);
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
