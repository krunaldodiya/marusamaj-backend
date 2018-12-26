<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'user_id', 'mobile', 'created_at', 'updated_at',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
