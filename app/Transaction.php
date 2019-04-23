<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subdistrict_id',
        'product_id',
        'account_id',
        'address',
        'postal_code',
        'note',
        'amount',
        'courier_name',
        'courier_type',
        'courier_fee',
        'quantity',
        'status',
        'payment_duedate',
        'payment_reminder',
    ];

    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
