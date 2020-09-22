<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'nickname', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * Get the avatar and return the default avatar if the avatar is null.
     *
     * @param string $value
     * @return string
     */
    // public function getAvatarAttribute($value)
    // {
    //     return isset($value) ? $value : config('mirou.default_avatar');
    // }

    public function message(){
        return $this->hasMany('App\Message','user_id');
    }

    // public function receiver(){
    //     return $this->hasMany('App\Message','receiver_id','id');
    // }
}
