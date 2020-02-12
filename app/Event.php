<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
   //Protected $fillable = ['','','']
   Protected $fillable = [
    'name', 'date', 'description','image_id', 'city', 'church_id',
];

protected $table='events'; 

public function myChurch() {
    return $this->hasOne('App\Church','user_id','id');
}
}
