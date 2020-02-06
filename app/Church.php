<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    //Protected $fillable = ['','','']
    Protected $fillable = [
        'name','description','image_id', 'address', 'location'
    ];
}
