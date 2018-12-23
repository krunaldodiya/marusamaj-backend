<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    protected $fillable = [
        'user_id', 'relative_id', 'user_relation', 'relative_relation', 'status', 'created_at', 'updated_at',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
