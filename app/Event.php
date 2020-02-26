<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
   //Protected $fillable = ['','','']
   Protected $fillable = [
    'name', 'date', 'description','image_url', 'city', 'church_id', 'venue', 'time'
];

protected $table='events'; 

}
