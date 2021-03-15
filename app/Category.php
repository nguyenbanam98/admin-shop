<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function categoryChildrent()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }    
}
