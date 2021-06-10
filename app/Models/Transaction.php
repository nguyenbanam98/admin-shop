<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    protected $paymentType = [
        1 => [
            'name' => 'Trả Bằng Tiền Mặt',
        ],
        2 => [
            'name' => 'Thanh Toán Online',
        ],
        3 => [
            'name' => 'Paypal',
        ],
    ];

    protected $statusProduct = [
        1 => [
            'class' => 'info',
            'name' => 'Tiếp nhận'
        ],
        2 => [
            'class' => 'danger',
            'name' => 'Đang vận chuyển'
        ],
        3 => [
            'class' => 'info',
            'name' => 'Đã bàn giao'
        ],
        -1 => [
            'class' => 'success',
            'name' => 'Đã hủy'
        ],
    ];

    public function getType()
    {
        return Arr::get($this->paymentType, $this->type, '[N\A]');
    }

    public function getStatus()
    {
        return Arr::get($this->statusProduct, $this->status, '[N\A]');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'customer_id');
    }

}
