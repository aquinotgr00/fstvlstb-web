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
        'payment_method',
        'payment_bank',
    ];

    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function production()
    {
        return $this->hasOne('App\Production');
    }

    public function paymentProof()
    {
        return $this->hasOne('App\PaymentProof');
    }
}
