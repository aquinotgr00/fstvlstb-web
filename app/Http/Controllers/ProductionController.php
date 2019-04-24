<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Production;

use DataTables;

class ProductionController extends Controller
{
    protected $productions;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Production $productions)
    {
        $this->middleware('auth');
        $this->productions = $productions;
    }

    /**
     * get list data from productions
     *
     * @return mixed
     */
    public function listData($batchId)
    {
        $data = $this->productions->where('production_batch_id', $batchId)
            ->get();
    	return DataTables::of($data)
            ->editColumn('transaction_id', '{!! sprintf("%06d", $transaction_id)!!}')
            ->editColumn('created_at', '{!! date("d-m-Y", strtotime($created_at))!!}')
            ->make(true);
    }
}
