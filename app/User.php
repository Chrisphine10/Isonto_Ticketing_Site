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

    public function post() {
        return $this->hasMany('App\Post');
    }
    public function event() {
        return $this->hasMany('App\Event');
    }    
    public function church() {
        return $this->hasOne('App\Church');
    }
    public function comment() {
        return $this->hasMany('App\Comment');
    }
    public function commentReaction() {
        return $this->hasMany('App\Commentreaction');
    }
    public function postReaction() {
        return $this->hasMany('App\Postreaction');
    }
    public function ticket() {
        return $this->hasMany('App\TicketToken');
    }
}
