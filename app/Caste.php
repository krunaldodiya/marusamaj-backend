<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Caste extends Model
{
    protected $fillable = [
        'name', 'created_at', 'updated_at',
    ];

    public function sub_castes()
    {
        return $this->hasMany(SubCaste::class);
    }

    protected $dates = ['created_at', 'updated_at'];
}
