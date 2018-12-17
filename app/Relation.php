<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $fillable = [
        'user_id', 'relative_id', 'user_relation', 'relative_relation', 'created_at', 'updated_at',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
