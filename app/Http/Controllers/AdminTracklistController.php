<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tracklist;
use Datatables;

class AdminTracklistController extends Controller
{

	protected $tracklist;
	public function __construct(Tracklist $tracklist)
	{	
		$this->tracklist = $tracklist;
	   	$this->middleware('auth');
	}

	 /**
	     * Show the application dashboard of tacklist page.
	     *
	     * @return \Illuminate\Contracts\Support\Renderable
	     */
	public function index()
	{

	   	return view('admin-page.tracklist');
	}

	   /**
	     * get list data from tracklist
	     *
	     * @return mixed
	     */
	public function listData(Request $request)
	{
	    	$data = $this->tracklist->query();
	    	return Datatables::eloquent($data)
					->order(function ($query) {
                        $query->orderBy('id', 'asc');
                	})
                ->toJson();
	}
}
