<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;

class GraphController extends Controller
{
    private $api;

    public function __construct(Facebook $fb)
    {
        $this->middleware(function ($request, $next) use ($fb) {
            $fb->setDefaultAccessToken($request->session()->get('facebook_token'));
            $this->api = $fb;
            return $next($request);
        });
    }

    public function publishToProfile(Request $request){
	    try {
	        $response = $this->api->post('/me/feed', [
	            'message' => "test"
	        ])->getGraphNode()->asArray();
	        if($response['id']){
	           // post created
	        	return redirect()->route('member.nif'); 

	        }
	    } catch (FacebookSDKException $e) {
	        dd($e); // handle exception
	    }
	}
}
