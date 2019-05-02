<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tracklist;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Tracklist $tracklists,Order $order)
    {
        $this->middleware('auth');
        $this->tracklist = $tracklists;
        $this->order = $order;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $tracklist = $this->tracklist->getListStreamDownload();
        $order = $this->order->reportOrder();
        return view('admin-page.dashboard',compact('tracklist','order'));
    }
}
