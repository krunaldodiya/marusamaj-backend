<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use KD\Wallet\Traits\HasWallet;
use App\Events\UserWasCreated;
use Laravel\Passport\HasApiTokens;
use Hash;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasWallet;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'city', 'caste_id', 'sub_caste_id', 'mobile', 'gender', 'dob', 'marital_status', 'education',
        'occupation', 'address', 'avatar', 'caste_updated', 'profile_updated', 'family_updated', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes shows the list of events.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => UserWasCreated::class
    ];
}
