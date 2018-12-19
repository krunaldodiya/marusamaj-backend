<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use KD\Wallet\Traits\HasWallet;
use App\Events\UserWasCreated;
use Laravel\Passport\HasApiTokens;
use Hash;
use Carbon\Carbon;

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
        'occupation', 'address', 'avatar', 'caste_updated', 'profile_updated', 'created_at', 'updated_at'
    ];

    protected $appends = ['age'];

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

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['dob'])->age;
    }

    public function getAvatarAttribute()
    {
        $avatar = $this->attributes['avatar'];

        if (is_null($avatar)) {
            $avatar = $this->attributes['gender'] === 'Male' ? url('/images/man.png') : url('/images/woman.png');
        }

        return $avatar;
    }

    public function caste()
    {
        return $this->belongsTo(Caste::class);
    }

    public function sub_caste()
    {
        return $this->belongsTo(SubCaste::class);
    }
}
