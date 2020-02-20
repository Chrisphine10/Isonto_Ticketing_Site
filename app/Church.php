<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    Protected $fillable = [
        'name', 'email', 'phone_number', 'description','image_id', 'address', 'city', 'user_id'
    ];

    protected $table='churches'; 

    public function myEvents() {
        return $this->hasMany('App\Event','event_id','id');
    }

    public function myBlogs() {
        return $this->hasMany('App\Blog','blog_id','id');
    }
}
