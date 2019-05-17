<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use Auth;

class TwitterController extends Controller
{	
	protected $twitteroauth;

    public function __construct(){
    	$this->middleware('auth:account');
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
			$url = $this->twitteroauth->url(
			    'oauth/authorize', [
			        'oauth_token' => $request_token['oauth_token']
			    ]
			);
		// generate the URL to make request to authorize our application
			$url = $this->twitteroauth->url(
			    'oauth/authorize', [
			        'oauth_token' => $request_token['oauth_token']
			    ]
			);

			return redirect()->to($url);
    }

    public function twitterCallback(Request $request){
    	$oauth_verifier = $request->oauth_verifier;
		if (empty($oauth_verifier) || empty($request->session()->get('oauth_token')) || empty($request->session()->get('oauth_token_secret'))
		){
		    return redirect()->to(config('services.twitter.url_login'));
		}

		$token = $this->tokenAccess($oauth_verifier,$request);

		$twitter = new TwitterOAuth(
			    config('services.twitter.consumer_key'),
		    	config('services.twitter.consumer_secret'),
			    $token['oauth_token'],
			    $token['oauth_token_secret']
			);
		// $path = \Storage::disk('s3')->get(Auth::guard('account')->user()->images);
		 $assetPath = \Storage::disk('s3')->url(Auth::guard('account')->user()->images);

        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=" . basename($assetPath));
        header("Content-Type: " . $asset->mime);

        $path =  readfile($assetPath);
		$media = $twitter->upload('media/upload', ['media' => $path]);
		$status = $twitter->post(
		    "statuses/update", [
		        "status" => "#FSTVLST",
		        'media_ids' => $media->media_id_string
		    ]
		);
 		
		echo ('Created new status with #'.$media->media_id_string);

    }
    private function tokenAccess($oauth_verifier,$request){
    	
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

    public function testImage(){

    }

}
