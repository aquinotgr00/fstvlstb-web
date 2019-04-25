<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'description', 
        'thumbnail', 'has_size', 'weight',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
