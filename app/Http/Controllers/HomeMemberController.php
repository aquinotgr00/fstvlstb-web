<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tracklist;

class HomeMemberController extends Controller
{
	protected $tracklist;

    public function __construct(tracklist $tracklist){
    	$this->tracklist = $tracklist;
    }

    public function index(){
    	$tracklist = $this->tracklist->get();

    	return view('frontend-page.index',compact('tracklist'));
    }
}
