<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserShop extends Model
{
    protected $guard = 'user_shop';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
