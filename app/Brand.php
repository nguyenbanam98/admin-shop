<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Brand extends Model
{
    protected $guarded = [];
    
    protected $table = 'brands';

    protected $status = [
        1 => [
            'name' => 'public',
            'class' => 'primary',
        ],
        0 => [
            'name' => 'private',
            'class' => 'danger',
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->active, '[N\A]');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
