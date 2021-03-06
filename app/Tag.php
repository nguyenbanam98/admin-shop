<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tags', 'product_id', 'tag_id');
    }
}
