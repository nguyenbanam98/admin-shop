<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $guarded = [];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'customer_id');
    }

}
