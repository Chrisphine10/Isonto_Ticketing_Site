<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    //Protected $fillable = ['','','']
    Protected $fillable = [
        'name', 'email', 'phone', 'description','image_id', 'address', 'location'
    ];

    protected $table='churches'; 
}
