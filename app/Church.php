<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    Protected $fillable = [
        'name', 'email', 'phone_number', 'description','image_url', 'address', 'city', 'user_id'
    ];

    protected $table='churches'; 

    public function user() {
        return $this->belongsTo('App\User');
    }

}
