<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductionBatch;

class ProductionBatchController extends Controller
{
    public function store(Request $request)
    {
        $transactions       = $this->transaction->where('status', 'paid')
            ->orderBy('created_at', 'ASC')
            ->get();

        if ($transactions->count() > 0) {
            $productionBatch    = new ProductionBatch;
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
