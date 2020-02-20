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
        'name', 'email', 'password', 'hasChurch', 'image_url'
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

    
    public function myChurch() {
        return $this->hasOne('App\Church','user_id','id');
    }
    public function myComment() {
        return $this->hasMany('App\Comment','user_id','id');
    }
    public function myCommentReaction() {
        return $this->hasMany('App\Commentreaction','user_id','id');
    }
    public function myPostReaction() {
        return $this->hasMany('App\Postreaction','user_id','id');
    }
}
