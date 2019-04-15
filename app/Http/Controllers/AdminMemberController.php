<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use Datatables;
class AdminMemberController extends Controller
{

	protected $members;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Account $accounts)
    {
        $this->middleware('auth');
        $this->members = $accounts;
    }

    /**
     * Show the application dashboard of member page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin-page.members');
    }

    /**
     * get list data from accounts
     *
     * @return mixed
     */
    public function listData(Request $request)
    {
    	$data = $this->members->get();
    	return Datatables::of($data)
    	->editColumn('id', '{!! sprintf("%06d", $id)!!}')
    	->editColumn('created_at', '{!! date("d-m-Y", strtotime($created_at))!!}')
    	->make(true);
    }
}
