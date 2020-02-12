<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    //Protected $fillable = ['','','']
    Protected $fillable = [
        'name', 'email', 'phone_number', 'description','image_id', 'address', 'city', 'user_id',
    ];

    protected $table='churches'; 
}
