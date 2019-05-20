<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{	

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:account');
    }
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->scopes([
            "publish_actions, manage_pages", "publish_pages"])->redirect();
    }
    /**
     * Obtain the user information from Facebook.
     *
     * @return void
     */
    public function handleProviderFacebookCallback(Request $request)
    {
        $auth_user = Socialite::driver('facebook')->user();
 		
 		$request->session()->put('facebook_token',$auth_user->token);
 
        return redirect()->route('facebook.publish'); // Redirect to a secure page
    }
}
