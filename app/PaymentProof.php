<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentProof extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id', 'account_id', 'token', 'image'
    ];
    
    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }
}
