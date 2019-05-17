<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterController extends Controller
{	
	protected $twitteroauth;

    public function __construct(){
    	$this->twitteroauth = new TwitterOAuth(config('services.twitter.consumer_key'), config('services.twitter.consumer_secret'));
    }

    public function twitterLogin(Request $request){

    	$request_token = $this->twitteroauth->oauth(
						    'oauth/request_token', [
						        'oauth_callback' => config('services.twitter.url_callback')
						    ]
						);
    	if($this->twitteroauth->getLastHttpCode() != 200) {
			    throw new \Exception('There was a problem performing this request');
			}
			 
			// save token of application to session
			$request->session()->put('oauth_token',$request_token['oauth_token']);
			$request->session()->put('oauth_token_secret',$request_token['oauth_token_secret']);
			 
			// generate the URL to make request to authorize our application
			$url = $twitteroauth->url(
			    'oauth/authorize', [
			        'oauth_token' => $request_token['oauth_token']
			    ]
			);
		// generate the URL to make request to authorize our application
			$url = $twitteroauth->url(
			    'oauth/authorize', [
			        'oauth_token' => $request_token['oauth_token']
			    ]
			);

			return redirect()->to($url);
    }

    public function twitterCallback(Request $request){
    	$oauth_verifier = $request->oauth_verifier;
 
		if (empty($oauth_verifier) || empty($_SESSION['oauth_token']) || empty($_SESSION['oauth_token_secret'])
		){
		    // something's missing, go and login again
		    return redirect()->to(config('services.twitter.url_login'));
		}

		$token = $this->tokenAccess($oauth_verifier);

		$twitter = new TwitterOAuth(
			    config('services.twitter.consumer_key'),
		    	config('services.twitter.consumer_secret'),
			    $token['oauth_token'],
			    $token['oauth_token_secret']
			);
		$status = $twitter->post(
		    "statuses/update", [
		        "status" => "Test"
		    ]
		);
 
		echo ('Created new status with #' . $status->id . PHP_EOL);

    }
    private function tokenAccess($oauth_verifier){
    	
    	// connect with application token
		$connection = new TwitterOAuth(
		    config('services.twitter.consumer_key'),
		    config('services.twitter.consumer_secret'),
		    $request->session()->get('oauth_token'),
		    $request->session()->get('oauth_token_secret')
		);
		 
		// request user token
		$token = $connection->oauth(
		    'oauth/access_token', [
		        'oauth_verifier' => $oauth_verifier
		    ]
		);
		return $token;
    }

}
