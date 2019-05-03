<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function boot() { // this is a recommended way to declare event handlers
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
            foreach ($user->orders as $key => $value) {
                if ( isset($value->transaction) ) {
                    $value->transaction->delete();
                }
            }
            $user->orders()->delete();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'description', 
        'thumbnail', 'has_size', 'weight',
    ];

    public function productImages()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
