<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;
use App\ProductionBatch;

use DataTables;

class TransactionController extends Controller
{
    protected $transactions;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Transaction $transactions)
    {
        $this->middleware('auth');
        $this->transactions = $transactions;
    }

    /**
     * Show the application dashboard of member page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin-page.transactions');
    }

    /**
     * get list data from transactions
     *
     * @return mixed
     */
    public function listData(Request $request)
    {
    	$data = $this->transactions->where('status', 'unpaid')->get();
    	return DataTables::of($data)
            ->editColumn('id', '{!! sprintf("%06d", $id)!!}')
            ->editColumn('created_at', '{!! date("d-m-Y", strtotime($created_at))!!}')
            ->make(true);
    }

    /**
     * get list data from transactions
     *
     * @return mixed
     */
    public function listPaidTransactions(Request $request)
    {
    	$data = $this->transactions->where('status', 'paid')->get();
    	return DataTables::of($data)
            ->editColumn('id', '{!! sprintf("%06d", $id)!!}')
            ->editColumn('created_at', '{!! date("d-m-Y", strtotime($created_at))!!}')
            ->make(true);
    }

    public function listDataById(Request $request)
    {
        $data = $this->transactions->where('status', $request->status)
                    ->doesntHave('production')
                    ->where('product_id', $request->id)
                    ->get();
    	return DataTables::of($data)
            ->editColumn('id', '{!! date("Y-m-d", strtotime($created_at))!!}-{!! sprintf("%06d", $id)!!}')
            ->editColumn('name', function ($data) {
                return $data->account->name;
            })
            ->editColumn('created_at', '{!! date("d-m-Y", strtotime($created_at))!!}')
            ->make(true);
    }
}
