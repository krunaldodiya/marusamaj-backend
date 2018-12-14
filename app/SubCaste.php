<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SubCaste extends Model
{
    protected $fillable = [
        'name', 'caste_id', 'created_at', 'updated_at',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function caste()
    {
        return $this->belongsTo(Caste::class);
    }
}
