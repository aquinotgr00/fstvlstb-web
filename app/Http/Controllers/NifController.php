<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NifController extends Controller
{
	
	public function __construct(){
    	$this->middleware('auth:account');
    }

    public function index(){

    	return view('frontend-page.nif');
    }
}
