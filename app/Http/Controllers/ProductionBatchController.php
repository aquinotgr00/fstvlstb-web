<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductionBatch;
use App\Transaction;
use App\Production;
use DataTables;

class ProductionBatchController extends Controller
{
    protected $productionBatch;
    protected $transaction;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductionBatch $productionBatch, Transaction $transaction)
    {
        $this->middleware('auth');
        $this->productionBatch = $productionBatch;
        $this->transaction = $transaction;
    }

    public function store(Request $request)
    {
        // return $request->all();
        $transactions       = $this->transaction->where('status', 'paid')
            ->where('product_id', $request->product_id)
            ->orderBy('created_at', 'ASC')
            ->get();

        if ($transactions->count() > 0) {
            $productionBatch    = new ProductionBatch;
            $productionBatch->product_id            = $request->product_id;
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
            // $productionBatch->getProductions;
            // return new ProductionBatchResource($productionBatch);
            return $productionBatch->toArray();
        } elseif ($transactions->count() == 0) {
            // return TransactionResource::collection($transactions);
            return $transaction->toArray();
        }
    }

    public function listDataById(Request $request)
    {
        $data = $this->productionBatch->where('product_id', $request->id)->get();
    	return DataTables::of($data)
            ->editColumn('created_at', '{!! date("d-m-Y", strtotime($created_at))!!}')
            ->make(true);
    }

    public function list($id)
    {
        $productionBatch = $this->productionBatch->findOrFail($id);
        return view('admin-page.production-batches', compact('productionBatch'));
    }
}
