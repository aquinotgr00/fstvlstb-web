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
        'tracking_number',
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

    public function getFullAddressAttribute()
    {
        $id = $this->attributes['subdistrict_id'];
        $subdistrict = \DB::table('subdistricts')->find($id);
        $city = \DB::table('cities')->find($subdistrict->city_id);
        $province = \DB::table('provinces')->find($city->province_id);
        return $subdistrict->name.', '.$city->name.', '.$province->name.' '.$this->attributes['postal_code'];
    }

    public static function getToReminder(int $interval)
    {
        return static::where('status','unpaid')
            ->where('payment_reminder','<=',$interval)
            ->get();
    }
}
