<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   Protected $fillable = [
    'image_url', 'church_id', 'post_id', 'event_id'
];

protected $table='images'; 
}
