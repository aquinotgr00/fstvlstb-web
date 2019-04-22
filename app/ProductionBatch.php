<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionBatch extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pre_order_id',
        'batch_qty',
        'start_production_date',
        'end_production_date',
        'notes'
    ];
}
