<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;

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

    public function createBatch(Request $request)
    {
        $transactions       = $this->transaction->where('status', 'paid')
            ->orderBy('created_at', 'ASC')
            ->get();

        if ($transactions->count() > 0) {
            $productionBatch    = new ProductionBatch;
            $productionBatch->pre_order_id          = $request->pre_order_id;
            $productionBatch->batch_name            = $request->batch_name;
            $productionBatch->batch_qty             = $transactions->count();
            $productionBatch->start_production_date = $request->start_production_date;
            $productionBatch->end_production_date   = $request->end_production_date;
            $productionBatch->save();
            
            foreach ($transactions as $value) {
                $new_production = new Production;
                $new_production->transaction_id = $value->id;
                $new_production->production_batch_id = $productionBatch->id;
                $new_production->save();
            }
            $productionBatch->getProductions;
            return new ProductionBatchResource($productionBatch);
        } elseif ($transactions->count() == 0) {
            return TransactionResource::collection($transactions);
        }
    }
}
