<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id',
        'product_id',
        'model',
        'size',
        'quantity',
        'subtotal',
        'price'
    ];

    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function reportOrder(){
        return $this->leftjoin('products','products.id','=','orders.product_id')
                    ->leftjoin('transactions','transactions.id','=','transaction_id')
                    ->whereIn('transactions.status',['paid','completed','shipped'])
                    ->groupBy('product_id')
                    ->orderBy('quantity', 'desc')
                    ->select(DB::raw('count(product_id) as quantity,products.name as product'))
                    ->get();
    }
}
