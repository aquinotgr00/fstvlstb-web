<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id', 'production_batch_id',
        'status', 'delivery_date', 'tracking_number',
        'received_confirmation'
    ];
}
