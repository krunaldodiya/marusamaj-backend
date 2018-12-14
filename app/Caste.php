<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Caste extends Model
{
    protected $fillable = [
        'name', 'created_at', 'updated_at',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
